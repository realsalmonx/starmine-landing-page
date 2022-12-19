<?php 

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];


$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}

$num1 = rand(0,3);
$num2 = rand(0,5);
$num3 = rand(0,9);
$num = $num1.''.$num2.''.$num3;
#   Bin lookup

$cctwo = substr("$cc", 0, 6); 
# ---------------------------------------# 
 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.''); 
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 
'Host: lookup.binlist.net', 
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628', 
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8' 
)); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, ''); 
$fim = curl_exec($ch); 
$alphaxd = getStr($fim, '"alpha2":"', '"'); 

# ADd info
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.bestrandoms.com/random-address-in-us');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'authority: www.bestrandoms.com';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'accept-language: en-US,en;q=0.9,vi;q=0.8';
// $headers[] = 'cookie: _ga=GA1.2.1157384349.1640430463; __gads=ID=32383a61bd09db5f-2266e6c00dd0006d:T=1641801782:RT=1641801782:S=ALNI_MbxtbIZaj31ZfwzoqmZpLhklJP9JA; PHPSESSID=sjoo7she1mfnolt00a9a78hu60; __cf_bm=TovXN9UckUKyvSeMp1iL2F01SpceWhZ03yzAkNILfBI-1646984987-0-AWNbnCEMggYoKE5IH6KZlrHuJA7U+HwFI8NhtyQgxoBNj6lRkL/sYCesmJt8r1HWAo4p3l1JmtG8m1SkpZ7Ei2ZhdfmXP9FzKhEbQWdR/jmKHw20cn0reKe/ACFN/85PsQ==';
$headers[] = 'sec-fetch-dest: document';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-site: none';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.51 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/add.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/add.txt');
$res2 = curl_exec($ch);
curl_close($ch);
$street = trim(strip_tags(getStr($res2,'<p><span><b>Street:</b>&nbsp;&nbsp;','</span>')));
$city = trim(strip_tags(getStr($res2,'<p><span><b>City:</b>&nbsp;&nbsp;','</span>')));
$country = trim(strip_tags(getStr($res2,'<span><b>Country</b>&nbsp;&nbsp;','</span>')));
$state = trim(strip_tags(getStr($res2,'<p><span><b>State/province/area: </b>&nbsp;&nbsp;','</span>')));
$phone = trim(strip_tags(getStr($res2,'<p><span><b>Phone number</b>&nbsp;&nbsp;','</span>')));
$zip = trim(strip_tags(getStr($res2,'<p><span><b>Zip code</b>&nbsp;&nbsp;','</span>')));
if(empty($zip)){
    $zip = 'ZIP';
}
if(empty($street)){
    $street = 'STREET';
}
if(empty($country)){
    $country = 'COUNTRY';
}
if(empty($state)){
    $state = 'STATE';
}
if(empty($phone)){
    $phone = 'PHONE';
}
if(empty($city)){
    $city = 'CITY';
}

# test thử




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://random-data-api.com/api/name/random_name');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$first = value($resposta, '"first_name":"', '"');
$last = value($resposta, '"last_name":"', '"');
if(empty($email)){
    $email = 'EMAIL';
}
if(empty($gender)){
    $gender = 'GENDER';
}
$date = strtoupper(''.$date.'');
# end of req
echo "$lista|$first|$last|$street|$city|$state|$zip|$country|$phone";



curl_close($ch);
ob_flush();
?>
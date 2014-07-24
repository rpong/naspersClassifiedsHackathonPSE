<?php
$apiURL = "http://api.olx.ph/index.php/get+price+range"; 
$APIKey = "0c789e7051ac8240afe54db253bc67569a822031"; 
$APISecret = "0d0e7844a78f5e4ccd67a26c0dfe17593b679add"; 

$keyword = 'cbr 150';
$categoryId = 18;

# sample possible values for categoryId:
# 156 = mobile
# 17 = cars and sedan
# 18 = motorcycles and scooters


$post = array( 
'keyword' => $keyword, 
'hash' => md5($APIKey. $keyword . $APISecret), 
'categoryId' => $categoryId,
'version' => '1.0', 
'apiKey' => $APIKey,
); 

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $apiURL ); 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_VERBOSE, 0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
$apiResponse = curl_exec($ch); 

echo '<pre>';
print_r(json_decode(utf8_encode($apiResponse)));
echo '<pre>';

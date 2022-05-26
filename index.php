<?php

require_once 'lib.php';
require_once 'jwt.lib.php';
$res = buildJWT();
var_dump($res);
$path = '5326cefcfe28204b592b6ca66b663fba38fdc8ed';
$arm = cfg()->moyskladVendorApiEndpointUrl . $path;
echo '<pre>';
print_r($arm);
echo '</pre>'; 

    
    
     function jsonEncode($input)
    {
        $json = json_encode($input);
        if (function_exists('json_last_error') && $errno = json_last_error()) {
            handleJsonError($errno);
        } elseif ($json === 'null' && $input !== null) {
            throw new DomainException('Null result with non-null input');
        }
        return $json;
    }
    
    ///////////////////////////////////////////////////
    
    function urlsafeB64Encode($input)
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }
    
    /////////////////////////////////////////////

$token = array(
        "sub" => cfg()->appUid,
        "iat" => time(),
        "exp" => time() + 300,
        "jti" => bin2hex(random_bytes(32))
    );    
    
$alg = 'HS256';
$header = array('typ' => 'JWT', 'alg' => $alg);
$segments = array();
$segments[] = urlsafeB64Encode(jsonEncode($header));
$segments[] = urlsafeB64Encode(jsonEncode($token));
$signing_input = implode('.', $segments); // соединяем через точку
//echo '<pre>';
//print_r($segments);
//echo '</pre>';


  $supported_algs = array(
        'HS256' => array('hash_hmac', 'SHA256'),
        'HS512' => array('hash_hmac', 'SHA512'),
        'HS384' => array('hash_hmac', 'SHA384'),
        'RS256' => array('openssl', 'SHA256'),
        'RS384' => array('openssl', 'SHA384'),
        'RS512' => array('openssl', 'SHA512'),
    );
  
  list($function, $algorithm) = $supported_algs[$alg];
  
  echo $function;
  echo $algorithm;
  $key = '3aqSqrGqFST6TGhCRUBZVJV2Fs4X9OU54C5opvFGvL0BCFpFxWHcsOEYbBeoihKlGXjzwiLV1CXVHB2V8Omda2eK3U6HTS2RQxwsCDF9XY1Hpl2ZKv8ejWiOOPltrksN';
  
  $b = hash_hmac($algorithm, $signing_input, $key);
 $segments[] = urlsafeB64Encode(jsonEncode($b));
 echo '<pre>';
print_r($segments);
echo '</pre>';
 $c = implode('.',$segments);
echo '<pre>';
print_r($c);
echo '</pre>';
$a = null;
$g = $a ? 1 : 2;
  echo '<pre>';
print_r($g);
echo '</pre>';

$a = 7;
$b = 6;

$issetta = $a != $b;

var_dump($issetta);



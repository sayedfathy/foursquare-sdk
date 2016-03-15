<?php
session_start();
require 'autoload.php';

$client_id = 'C04OAUYRFCYUSKDTJ00XJU10CIATOYXRURKLBSW0REBKCTJH';
$client_secret = 'UE2MFPYEFITXK25G3KFW3CPVOZ1JFDLUCM3NWNCW04U14TSL';
$redirect_uri = 'http://localhost/try/fsquare_api/demo.php';

$fsquare = Foursquare::api();
$fsquare->setClientId($client_id);
$fsquare->setClientSecret($client_secret);
$fsquare->setRedirectUri($redirect_uri);

$login = $fsquare->getLoginUrl();
echo "<a href=$login>Click here</a>";

if(isset($_GET['code'])) {

	$fsquare->authenticate($_GET['code']);
	$fsquare->request('users/search',array("name"=>'sayed','age'=>123,'id'=>'hello'));
}

$arr = array(array(1,2,3)=>'sayed');
print_r(array_keys($arr));






?>
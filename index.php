<?php

# Include the Dropbox SDK libraries
require_once "dropbox-sdk/Dropbox/autoload.php";
use \Dropbox as dbx;

$appInfo = dbx\AppInfo::loadFromJsonFile("test.php");
$webAuth = new dbx\WebAuthNoRedirect($appInfo, "PHP-Example/1.0");

//Please add Generated access token
$authCode = "2hVdoBBSsJAAAAAAAAAAElAuNMtEdsfsdfsdfdsROndsusedbNzZgSAPMKqoh6SXs";

$authorizeUrl = $webAuth->start();


$dbxClient = new dbx\Client($authCode, "PHP-Example/1.0");
print_r($dbxClient);

// get current user information 
$accountInfo = $dbxClient->getAccountInfo();
//print_r($accountInfo);


//get file directory information in list 
/*$folderMetadata = $dbxClient->getMetadataWithChildren("/");
print_r($folderMetadata);*/


//create folder
/*$folderMetadata = $dbxClient->createFolder("/1123456");
print_r($folderMetadata);*/


//delete folder and file 
/*$folderMetadata = $dbxClient->delete("/");
print_r($folderMetadata);*/

//folder meta data
/*$folderMetadata = $dbxClient->getMetadataWithChildren("/");
print_r($folderMetadata);*/

//File upload code
/*$f = fopen("mail.php", "rb");
$result = $dbxClient->uploadFile("/mail.php", dbx\WriteMode::add(), $f);
fclose($f);
print_r($result);*/

//Download File
/*$f = fopen("download/mail.php", "w+b");
$fileMetadata = $dbxClient->getFile("/mail.php", $f);
fclose($f);
print_r($fileMetadata);*/
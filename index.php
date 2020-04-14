<?php
require_once './qiniu-sdk/autoload.php';
require_once './QiniuPackage.php';

$Qiniu = new QiniuPackage();
$url = $Qiniu->getImageUrl('natural_test.jpg');
var_dump($url);



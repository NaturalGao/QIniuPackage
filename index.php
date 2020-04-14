<?php
require_once './qiniu-sdk/autoload.php';
require_once './QiniuPackage.php';

$Qiniu = new QiniuPackage();

/**
 * 获取图片地址
 */
//$key = 'natural_test';
//$Qiniu = new QiniuPackage();
//$url = $Qiniu->getImageUrl($key);
//var_dump($url);

/**
 * 上传图片
 */
//$key = 'test';
//$filePath = './nike.jpg';
//$url = $Qiniu->uploadImage($key,$filePath);
//var_dump($url);


/**
 * 删除图片
 */
$key = 'test';
$res = $Qiniu->deleteImage($key);
$res ? var_dump('删除图片成功') : var_dump('删除图片失败');


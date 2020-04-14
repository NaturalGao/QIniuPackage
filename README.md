# QIniuPackage
**工作中用到了七牛云存储，于是对它进行了封装。**

## 配置
暂且放在QiniuPackage.php文件的__construct中,可以考虑另外创建多个配置文件

        $this->accessKey = '';  //七牛云AK
        $this->secretKey = '';//七牛云SK
        $this->bucket = '';   //七牛云存储空间
        $this->domain = '';   //七牛云存储域名
## 需要引入的文件
```php
require_once './qiniu-sdk/autoload.php';
require_once './QiniuPackage.php';
```
## 快速上手
上传一张图片
```php
<?php
$Qiniu = new QiniuPackage();
$key = 'test';
$filePath = './nike.jpg';
//上传成功后返回图片地址，否则false
$url = $Qiniu->uploadImage($key,$filePath);
```
## 功能（持续更新...）
1. 上传图片
```php
<?php
//上传成功后返回图片地址，否则false
$Qiniu->uploadImage($key,$filePath);
```
2. 获取图片
```php
//如果图片不存在，提示“图片不存在或已删除”，存在返回地址
$Qiniu->getImageUrl($key);
```
3. 删除图片
```php
//删除成功返回true，失败false
$Qiniu->deleteImage($key);
```


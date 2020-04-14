<?php

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;

class QiniuPackage
{
    private $accessKey;     //Ak
    private $secretKey;     //Sk
    private $bucket;        //存储空间
    private $domain;

    private $auth;
    private $UploadManager;
    private $BucketManager;

    public function __construct()
    {
        $this->accessKey = '';  //七牛云AK
        $this->secretKey = '';//七牛云SK
        $this->bucket = '';   //七牛云存储空间
        $this->domain = '';   //七牛云存储域名
        $this->auth = new Auth($this->accessKey, $this->secretKey);
        $this->UploadManager = new UploadManager();
        $this->BucketManager = new BucketManager($this->auth);
    }

    /**
     * 获取授权token
     * @return mixed
     */
    public function getUploadToken()
    {
        return $this->auth->uploadToken($this->bucket);
    }

    /**
     * 上传文件图片
     * @param $key
     * @param $filePath
     * @return bool
     * @throws Exception
     */
    public function uploadImage($key, $filePath)
    {
        $token = $this->getUploadToken();
        $status = $this->UploadManager->putFile($token,$key,$filePath);
        return $status ? $this->getImageUrl($key) : false;
    }

    /**
     * 获取图片地址
     * @param $key
     * @return string
     */
    public function getImageUrl($key)
    {
        $file_info = $this->getImageStat($key);
        if (!$file_info){
            return '图片已删除或不存在';
        }
        return $this->domain ."/".$key;
    }

    /**
     * 删除图片
     * @param $key
     * @return bool
     */
    public function deleteImage($key)
    {
        $status = $this->BucketManager->delete($this->bucket,$key);
        return !$status ? true : false;
    }

    /**
     * 获取图片元信息
     * @param $key
     * @return mixed
     */
    public function getImageStat($key)
    {
        $info = $this->BucketManager->stat($this->bucket,$key);
        return $info[0];
    }
}
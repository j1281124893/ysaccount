<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class UploadPictureRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 商户用户号
     */
    public $userCode;

    /**
     * 图片类型
     */
    public $picType;

    /**
     * 获取的token值
     */
    public $token;


    /**
     * 图片路径
     */
    public $filePath;

    /**
     * 文件名加后缀
     */
    public $filename;

    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'userCode' => $model->userCode,
            'picType' => $model->picType,
            'token' => $model->token,
            'filePath' => $model->filePath,
            'filename' => $model->filename,
        );

        return $param;
    }



    public static function getCheckRules()
    {

        $checkRules = array(
            'uploadPictureRequest' => [
                'userCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'picType' => [
                    Validator::MAX_LEN => 2,
                ],
                'token' => [
                    Validator::MAX_LEN => 200,
                ],

            ],

        );

        return $checkRules['uploadPictureRequest'];
    }


}
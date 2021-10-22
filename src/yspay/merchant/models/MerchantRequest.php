<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class MerchantRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 商户用户号
     */
    public $userCode;

    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'userCode' => $model->userCode,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'merchantRequest' => [
                'userCode' => [
                    Validator::MAX_LEN => 30,
                ],
            ],

        );

        return $checkRules['merchantRequest'];
    }

    public static function build($kernel ,$model){
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "userCode" => $model->userCode
        );
        return $bizReqJson;
    }

}
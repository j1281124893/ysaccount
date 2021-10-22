<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class MerchantReportQueryRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 商户用户号
     */
    public $appUserCode;

    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'merchantReportQueryRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
            ],

        );

        return $checkRules['merchantReportQueryRequest'];
    }

    public static function build($kernel ,$model){
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode
        );
        return $bizReqJson;
    }

}
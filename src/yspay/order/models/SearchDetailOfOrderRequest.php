<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class SearchDetailOfOrderRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 用户号
     */
    public $appUserCode;

    public $orderId;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'orderId' => $model->orderId,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'searchDetailOfOrderRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'orderId' => [
                    Validator::MAX_LEN => 30,
                ],


            ],

        );

        return $checkRules['searchDetailOfOrderRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "orderId" => $model->orderId,
        );

        return $bizReqJson;
    }
}
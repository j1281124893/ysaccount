<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class FrozenAccountRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 用户号
     */
    public $appUserCode;

    public $type;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'type' => $model->type,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'frozenAccountRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'type' => [
                    Validator::MAX_LEN => 2,
                ],


            ],

        );

        return $checkRules['frozenAccountRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "type" => $model->type,

        );

        return $bizReqJson;
    }

}
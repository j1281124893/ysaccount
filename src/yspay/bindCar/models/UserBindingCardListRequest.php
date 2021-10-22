<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class UserBindingCardListRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 用户号
     */
    public $appUserCode;

    /**
     * 客户类型 用户A1，商户A2，不传默认A1
     */
    public $flag;



    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'flag' => $model->flag,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'userBindingCardListRequest' => [
               
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],


            ],

        );

        return $checkRules['userBindingCardListRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "flag" => $model->flag,
        );

        return $bizReqJson;
    }
}
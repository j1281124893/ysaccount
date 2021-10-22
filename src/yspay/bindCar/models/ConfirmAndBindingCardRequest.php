<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class ConfirmAndBindingCardRequest
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
     * 签约登记流水号
     */
    public $sn;

    /**
     * 短信验证码
     */
    public $smsCode;

    /**
     * 客户类型
     */
    public $flag;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'sn' => $model->sn,
            'smsCode' => $model->smsCode,
            'flag' => $model->flag,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'confirmAndBindingCardRequest' => [
                
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'sn' => [
                    Validator::MAX_LEN => 30,
                ],
                'smsCode' => [
                    Validator::MAX_LEN => 6,
                ],


            ],

        );

        return $checkRules['confirmAndBindingCardRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "sn" => $model->sn,
            "smsCode" => $model->smsCode,
            "flag" => $model->flag,
        );

        return $bizReqJson;
    }

}
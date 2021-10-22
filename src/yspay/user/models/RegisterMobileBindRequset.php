<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class RegisterMobileBindRequset
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
     * 注册手机号
     */
    public $mobile;

    /**
     * 验证码
     */
    public $verificationCode;

    /**
     * 客户标识 A1-个户，A2-商户
     */
    public $flag;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'mobile' => $model->mobile,
            'verificationCode' => $model->verificationCode,
            'flag' => $model->flag,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'registerMobileBindRequset' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'mobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'verificationCode' => [
                    Validator::MAX_LEN => 6,
                ],
                'flag' => [
                    Validator::MAX_LEN => 2,
                ],


            ],

        );

        return $checkRules['registerMobileBindRequset'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "mobile" => $model->mobile,
            "verificationCode" => $model->verificationCode,
            "flag" => $model->flag,
        );

        return $bizReqJson;
    }

}
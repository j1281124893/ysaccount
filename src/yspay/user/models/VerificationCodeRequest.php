<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';

/**
 * @Desc 手机验证码
 * @DATA 2021年6月21日下午2:02:09
 */
class VerificationCodeRequest
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
     * 验证类型
     */
    public $funcode;

    /**
     * 客户标识
     */
    public $flag;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'mobile' => $model->mobile,
            'funcode' => $model->funcode,
            'flag' => $model->flag,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'verificationCodeRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'mobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'funcode' => [
                    Validator::MAX_LEN => 2,
                ],
                'flag' => [
                    Validator::MAX_LEN => 2,
                ],


            ],

        );

        return $checkRules['verificationCodeRequest'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "mobile" => $model->mobile,
            "funcode" => $model->funcode,
            "flag" => $model->flag,
        );

        return $bizReqJson;
    }
}
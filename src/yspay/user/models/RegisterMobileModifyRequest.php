<?php
use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class RegisterMobileModifyRequest
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
     * 用户号
     */
    public $mobile;

    /**
     * 用户号
     */
    public $verificationCode;

    /**
     * 用户号
     */
    public $newMobile;

    /**
     * 用户号
     */
    public $flag;



    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'mobile' => $model->mobile,
            'verificationCode' => $model->verificationCode,
            'newMobile' => $model->newMobile,
            'flag' => $model->flag,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'registerMobileModifyRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'mobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'verificationCode' => [
                    Validator::MAX_LEN => 6,
                ],
                'newMobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'flag' => [
                    Validator::MAX_LEN => 2,
                ],


            ],

        );

        return $checkRules['registerMobileModifyRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "mobile" => $model->mobile,
            "verificationCode" => $model->verificationCode,
            "newMobile" => $model->newMobile,
            "flag" => $model->flag,
        );

        return $bizReqJson;
    }
}
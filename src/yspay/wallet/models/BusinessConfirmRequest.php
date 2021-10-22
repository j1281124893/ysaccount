<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class BusinessConfirmRequest
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
    public $verificationCode;

    /**
     * 业务类型 业务类型：01-充值02-提现 03-钱包 04-快捷 05-反扫
     */
    public $businesType;

    /**
     * 付款方类型  付款方类型：用户A1，商户A2，不传默认A1
     */
    public $flag;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'sn' => $model->sn,
            'verificationCode' => $model->verificationCode,
            'businesType' => $model->businesType,
            'flag' => $model->flag,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'businessConfirmRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'sn' => [
                    Validator::MAX_LEN => 30,
                ],
                'verificationCode' => [
                    Validator::MAX_LEN => 6,
                ],
                'businesType' => [
                    Validator::MAX_LEN => 2,
                ],


            ],

        );

        return $checkRules['businessConfirmRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "sn" => $model->sn,
            "verificationCode" => $model->verificationCode,
            "businesType" => $model->businesType,
            "flag" => $model->flag,

        );

        return $bizReqJson;
    }
}
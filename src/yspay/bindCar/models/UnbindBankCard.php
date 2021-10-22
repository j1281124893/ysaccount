<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class UnbindBankCard
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
     * 卡片编号
     */
    public $cardToken;

    /**
     * 客户类型 用户A1，商户A2，不传默认A1
     */
    public $flag;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'cardToken' => $model->cardToken,
            'flag' => $model->flag,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'unbindBankCardRequest' => [
               
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'cardToken' => [
                    Validator::MAX_LEN => 30,
                ],



            ],

        );

        return $checkRules['unbindBankCardRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "cardToken" => $model->cardToken,
            "flag" => $model->flag,
        );

        return $bizReqJson;
    }

}
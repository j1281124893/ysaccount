<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class BindingBankCardRequest
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
     * 银行预留手机号
     */
    public $mobile;

    /**
     * 银行卡号
     */
    public $bankAccountNo;

    /**
     * 有效期
     */
    public $validTimeEnd;

    /**
     * CVV2
     */
    public $cvv;

    /**
     * 客户类型
     */
    public $flag;



    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'mobile' => $model->mobile,
            'bankAccountNo' => $model->bankAccountNo,
            'validTimeEnd' => $model->validTimeEnd,
            'cvv' => $model->cvv,
            'flag' => $model->flag,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'bindingBankCardRequest' => [
                
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'mobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'bankAccountNo' => [
                    Validator::MAX_LEN => 19,
                ],


            ],

        );

        return $checkRules['bindingBankCardRequest'];
    }

    public static function build($kernel ,$model){
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "mobile" => $model->mobile,
            "bankAccountNo" => $model->bankAccountNo,
            "validTimeEnd" => $model->validTimeEnd,
            "cvv" => $model->cvv,
            "flag" => $model->flag,
        );

        return $bizReqJson;
    }

}
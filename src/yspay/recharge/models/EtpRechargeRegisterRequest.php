<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class EtpRechargeRegisterRequest
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
     * 充值金额
     */
    public $amount;

    /**
     * 企业充值订单号
     */
    public $orderId;

    /**
     * 银行行别
     */
    public $bankType;

    /**
     * 客户类型
     */
    public $flag;

    /**
     * 通知地址
     */
    public $notifyUrl;

    /**
     * 备注信息
     */
    public $note;

    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'amount' => $model->amount,
            'orderId' => $model->orderId,
            'bankType' => $model->bankType,
            'flag' => $model->flag,
            'notifyUrl' => $model->notifyUrl,
            'note' => $model->note,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'rechargeBusinessEnregisterRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'amount' => [
                    Validator::MAX_LEN => 11,
                ],
                'orderId' => [
                    Validator::MAX_LEN => 32,
                ],
                'bankType' => [
                    Validator::MAX_LEN => 10,
                ],
                'flag' => [
                    Validator::MAX_LEN => 2,
                ],
                'notifyUrl' => [
                ],

            ],

        );

        return $checkRules['rechargeBusinessEnregisterRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "amount" => $model->amount,
            "orderId" => $model->orderId,
            "bankType" => $model->bankType,
            "flag" => $model->flag,
            "notifyUrl" => $model->notifyUrl,
            "note" => $model->note,

        );

        return $bizReqJson;
    }
}
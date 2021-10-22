<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class TransferPayRegisterRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 付款方用户号
     */
    public $payerUserCode;

    /**
     * 付款方用户名
     */
    public $payerName;

    /**
     * 收款方用户号
     */
    public $payeeUserCode;

    /**
     * 收款方用户名
     */
    public $payeeName;

    /**
     * 交易类型
     */
    public $businesType;

    /**
     * 订单号
     */
    public $orderId;

    /**
     * 订单金额
     */
    public $amount;

    /**
     * 转账说明
     */
    public $note;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'payerUserCode' => $model->payerUserCode,
            'payerName' => $model->payerName,
            'payeeUserCode' => $model->payeeUserCode,
            'payeeName' => $model->payeeName,
            'businesType' => $model->businesType,
            'orderId' => $model->orderId,
            'amount' => $model->amount,
            'note' => $model->note,


        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'transferPayRegisterRequest' => [
                'payerUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'payerName' => [
                    Validator::MAX_LEN => 11,
                ],
                'payeeUserCode' => [
                    Validator::MAX_LEN => 20,
                ],
                'payeeName' => [
                    Validator::MAX_LEN => 11,
                ],
                'businesType' => [
                    Validator::MAX_LEN => 2,
                ],
                'orderId' => [
                    Validator::MAX_LEN => 30,
                ],
                'amount' => [
                    Validator::MAX_LEN => 11,
                ],
                'note' => [
                    Validator::MAX_LEN => 100,
                ],

            ],

        );

        return $checkRules['transferPayRegisterRequest'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "payerUserCode" => $model->payerUserCode,
            "payerName" => $model->payerName,
            "payeeUserCode" => $model->payeeUserCode,
            "payeeName" => $model->payeeName,
            "businesType" => $model->businesType,
            "orderId" => $model->orderId,
            "amount" => $model->amount,
            "note" => $model->note,

        );

        return $bizReqJson;
    }
}
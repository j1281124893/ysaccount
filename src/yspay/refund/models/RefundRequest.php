<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class RefundRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 退款订单号
     */
    public $refundOrderId;

    /**
     * 退款金额
     */
    public $refundAmount;

    /**
     * 原订单编号
     */
    public $orderId;

    /**
     * 退款原因
     */
    public $note;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'refundOrderId' => $model->refundOrderId,
            'refundAmount' => $model->refundAmount,
            'orderId' => $model->orderId,
            'note' => $model->note,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'refundRequest' => [
             
                'refundOrderId' => [
                    Validator::MAX_LEN => 30,
                ],
                'refundAmount' => [
                    Validator::MAX_LEN => 15,
                ],
                'orderId' => [
                    Validator::MAX_LEN => 30,
                ],


            ],

        );

        return $checkRules['refundRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "refundOrderId" => $model->refundOrderId,
            "refundAmount" => $model->refundAmount,
            "orderId" => $model->orderId,
            "note" => $model->note,

        );

        return $bizReqJson;
    }
}
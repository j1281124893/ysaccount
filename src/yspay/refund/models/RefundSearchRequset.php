<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class RefundSearchRequset
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 退款订单号
     */
    public $orderId;

    /**
     * 原订单编号
     */
    public $refundOrderId;



    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'orderId' => $model->orderId,
            'refundOrderId' => $model->refundOrderId,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'refundSearchRequset' => [
                'orderId' => [
                    Validator::MAX_LEN => 30,
                ],
                'refundOrderId' => [
                    Validator::MAX_LEN => 30,
                ],


            ],

        );

        return $checkRules['refundSearchRequset'];
    }


    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "refundOrderId" => $model->refundOrderId,
            "orderId" => $model->orderId,
        );

        return $bizReqJson;
    }
}
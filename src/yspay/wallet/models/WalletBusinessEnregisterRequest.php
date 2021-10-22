<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class WalletBusinessEnregisterRequest
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
     * 收款方商户名称
     */
    public $merchantName;

    /**
     * 金额
     */
    public $amount;

    /**
     * 商户订单号
     */
    public $orderId;

    /**
     * 业务类型
     */
    public $businesType;

    /**
     * 交易类型
     */
    public $tranBissType;

    /**
     * 收款商户号的商号usercode，
     */
    public $merchantId;

    /**
     * 备注(100字)
     */
    public $note;




    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'merchantName' => $model->merchantName,
            'amount' => $model->amount,
            'orderId' => $model->orderId,
            'businesType' => $model->businesType,
            'tranBissType' => $model->tranBissType,
            'merchantId' => $model->merchantId,
            'note' => $model->note,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'walletBusinessEnregisterRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'merchantName' => [
                    Validator::MAX_LEN => 30,
                ],
                'amount' => [
                    Validator::MAX_LEN => 11,
                ],
                'orderId' => [
                    Validator::MAX_LEN => 32,
                ],
                'businesType' => [
                    Validator::MAX_LEN => 2,
                ],
                'tranBissType' => [
                    Validator::MAX_LEN => 2,
                ],
                'merchantId' => [
                    Validator::MAX_LEN => 20,
                ],


            ],

        );

        return $checkRules['walletBusinessEnregisterRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "merchantName" => $model->merchantName,
            "amount" => $model->amount,
            "orderId" => $model->orderId,
            "businesType" => $model->businesType,
            "tranBissType" => $model->tranBissType,
            "merchantId" => $model->merchantId,
            "note" => $model->note,
        );

        return $bizReqJson;
    }
}
<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class RechargeBusinessEnregisterRequest
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
     * 金额
     */
    public $amount;

    /**
     * 商户订单号(32位)
     */
    public $orderId;

    /**
     * 业务类型
     */
    public $businesType;

    /**
     * 付款方类型
     */
    public $flag;

    /**
     * 备注(100字)
     */
    public $note;

    /**
     * 绑定银行的token值
     */
    public $cardToken;




    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'amount' => $model->amount,
            'orderId' => $model->orderId,
            'businesType' => $model->businesType,
            'flag' => $model->flag,
            'note' => $model->note,
            'cardToken' => $model->cardToken,
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
                'businesType' => [
                    Validator::MAX_LEN => 2,
                ],
                'cardToken' => [
                    Validator::MAX_LEN => 30,
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
            "businesType" => $model->businesType,
            "note" => $model->note,
            "cardToken" => $model->cardToken,
        );

        return $bizReqJson;
    }
}
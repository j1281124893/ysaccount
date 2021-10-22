<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class WalletPayQrCodeRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 用户号
     */
    public $appUserCode;
    public $orderId;
    public $qrCodeType;
    public $cardToken;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'orderId' => $model->orderId,
            'qrCodeType' => $model->qrCodeType,
            'cardToken' => $model->cardToken,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'walletPayQrCodeRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'orderId' => [
                    Validator::MAX_LEN => 30,
                ],
                'qrCodeType' => [
                    Validator::MAX_LEN => 2,
                ],



            ],

        );

        return $checkRules['walletPayQrCodeRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            'appUserCode' => $model->appUserCode,
            'orderId' => $model->orderId,
            'qrCodeType' => $model->qrCodeType,
            'cardToken' => $model->cardToken,
        );

        return $bizReqJson;
    }
}
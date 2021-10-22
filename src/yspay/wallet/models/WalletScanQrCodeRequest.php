<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class WalletScanQrCodeRequest
{

    /**
     * App密钥
     */
    public $appSecret;


    public $amount;
    public $authCode;
    public $orderId;
    public $merchantId;
    public $merchantName;
    public $subject;
    public $note;
    public $bgUrl;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'amount' => $model->amount,
            'authCode' => $model->authCode,
            'orderId' => $model->orderId,
            'merchantId' => $model->merchantId,
            'merchantName' => $model->merchantName,
            'subject' => $model->subject,
            'note' => $model->note,
            'bgUrl' => $model->bgUrl,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'walletScanQrCodeRequest' => [
                'amount' => [
                    Validator::MAX_LEN => 30,
                ],
                'authCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'orderId' => [
                    Validator::MAX_LEN => 30,
                ],
                'merchantId' => [
                    Validator::MAX_LEN => 30,
                ],
                'merchantName' => [
                    Validator::MAX_LEN => 60
                ],
                'bgUrl' => [
                    Validator::MAX_LEN => 50,
                ],



            ],

        );

        return $checkRules['walletScanQrCodeRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            'amount' => $model->amount,
            'authCode' => $model->authCode,
            'orderId' => $model->orderId,
            'merchantId' => $model->merchantId,
            'merchantName' => $model->merchantName,
            'subject' => $model->subject,
            'note' => $model->note,
            'bgUrl' => $model->bgUrl,
        );

        return $bizReqJson;
    }
}
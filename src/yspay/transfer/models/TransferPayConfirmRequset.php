<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class TransferPayConfirmRequset
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
     * 申请流水号
     */
    public $sn;

    /**
     * 短信验证码
     */
    public $verificationCode;

    /**
     * 交易类型  （00-用户转用户、01-商户转商户、02-商户转用户、03-商户转平台、04-平台转商户、05-平台转用户、06-供应商转供应商、07-供应商转商户、08-供应商转平台、09-供应商转用户、10-商户转供应商、11-平台转供应商）
     */
    public $businesType;



    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'payerUserCode' => $model->payerUserCode,
            'sn' => $model->sn,
            'verificationCode' => $model->verificationCode,
            'businesType' => $model->businesType,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'transferPayConfirmRequset' => [
                'payerUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'sn' => [
                    Validator::MAX_LEN => 30,
                ],
                'verificationCode' => [
                    Validator::MAX_LEN => 6,
                ],
                'businesType' => [
                    Validator::MAX_LEN => 2,
                ],

            ],

        );

        return $checkRules['transferPayConfirmRequset'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            'payerUserCode' => $model->payerUserCode,
            'sn' => $model->sn,
            'verificationCode' => $model->verificationCode,
            'businesType' => $model->businesType,
        );

        return $bizReqJson;
    }
}
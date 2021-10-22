<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class CardInformationRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 用户号
     */
    public $appUserCode;
    public $bankAccountNo;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'bankAccountNo' => $model->bankAccountNo,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'cardInformationRequest' => [
               
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'bankAccountNo' => [
                    Validator::MAX_LEN => 20,
                ],



            ],

        );

        return $checkRules['cardInformationRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "bankAccountNo" => $model->bankAccountNo,
        );

        return $bizReqJson;
    }
}
<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class DivsionOrderQueryRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    public $accountDate;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'accountDate' => $model->accountDate,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'divsionOrderQueryRequest' => [
                'accountDate' => [
                    Validator::MAX_LEN => 8,
                ],

            ],

        );

        return $checkRules['divsionOrderQueryRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            'accountDate' => $model->accountDate,
        );

        return $bizReqJson;
    }
}
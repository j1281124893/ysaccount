<?php

namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))) . '\util\Validator.php';


class ApplyAccountRequest
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
     * 用户类型
     */
    public $userType;

    /**
     * 访问终端
     */
    public $accessTerminal;

    /**
     * 真实姓名
     */
    public $name;

    /**
     * 证件类型
     */
    public $certifiType;

    /**
     * 证件号码
     */
    public $certifiNo;

    /**
     * 拓展参数
     */
    public $expansion;

    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'userType' => $model->userType,
            'accessTerminal' => $model->accessTerminal,
            'name' => $model->name,
            'certifiType' => $model->certifiType,
            'certifiNo' => $model->certifiNo,
            'expansion' => $model->expansion,
        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'applyAccountRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'userType' => [
                    Validator::MAX_LEN => 2,
                ],
                'accessTerminal' => [
                    Validator::MAX_LEN => 2,
                ],
                'name' => [
                    Validator::MAX_LEN => 50,
                ],
                'certifiType' => [
                    Validator::MAX_LEN => 2,
                ],
                'certifiNo' => [
                    Validator::MAX_LEN => 18,
                ],

            ],

        );

        return $checkRules['applyAccountRequest'];
    }

    public static function build($kernel, $model)
    {
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            "appUserCode" => $model->appUserCode,
            "userType" => $model->userType,
            "accessTerminal" => $model->accessTerminal,
            "name" => $model->name,
            "certifiType" => $model->certifiType,
            "certifiNo" => $model->certifiNo,
            "expansion" => $model->expansion

        );

        return $bizReqJson;
    }
}
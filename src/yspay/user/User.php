<?php

namespace Yspay\Yzt\SDK;


use Exception;
use RegisterMobileModifyRequest;
use Yspay\SDK\Model\FastConsumptionRequest;
use Yspay\SDK\Model\FrozenAccountRequest;
use Yspay\SDK\Model\VerificationCodeRequest;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\SDK\Model\ApplyAccountRequest;
use Yspay\SDK\Model\GetGetAccountInfoRequest;
use Yspay\SDK\Model\RegisterMobileBindRequset;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class User
{


    public $common;
    protected $kernel;

    public function __construct($kernel)
    {
        $this->common = new Common($kernel);
        $this->kernel = $kernel;
    }


    /**
     * @Desc 用户开户
     * @DATA 2021年6月21日下午2:02:09
     */
    public function applyAccount($model)
    {
        try {
            $check = $this->common->checkFields(ApplyAccountRequest::getCheckRules()
                , ApplyAccountRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('applyAccount', $this->kernel, $aes_key);
            $bizReqJson = ApplyAccountRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['applyAccountUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }

    /**
     * @Desc 用户信息查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function getAccountInfo($model)
    {
        try {
            $check = $this->common->checkFields(GetGetAccountInfoRequest::getCheckRules()
                , GetGetAccountInfoRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('getAccountInfo', $this->kernel, $aes_key);
            $bizReqJson = GetGetAccountInfoRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['getAccountInfoUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }


    /**
     * @Desc 注册手机号绑定
     * @DATA 2021年6月21日下午2:02:09
     */
    public function registerMobileBind($model)
    {
        try {
            $check = $this->common->checkFields(RegisterMobileBindRequset::getCheckRules()
                , RegisterMobileBindRequset::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('registerMobileBind', $this->kernel, $aes_key);
            $bizReqJson = RegisterMobileBindRequset::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['getAccountInfoUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }


    /**
     * @Desc 手机验证码
     * @DATA 2021年6月21日下午2:02:09
     */
    public function verificationCode($model)
    {
        try {
            $check = $this->common->checkFields(VerificationCodeRequest::getCheckRules()
                , VerificationCodeRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('verificationCode', $this->kernel, $aes_key);
            $bizReqJson = VerificationCodeRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['verificationCodeUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }


    /**
     * lfk
     * @Desc 修改注册手机号
     * @DATA 2021年6月21日下午2:02:09
     */
    public function registerMobileModify($model)
    {
        try {
            $check = $this->common->checkFields(RegisterMobileModifyRequest::getCheckRules()
                , RegisterMobileModifyRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('registerMobileModify', $this->kernel, $aes_key);
            $bizReqJson = RegisterMobileModifyRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['registerMobileModifyUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }


    /**
     * lfk
     * @Desc 快捷消费申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function fastConsumption($model)
    {
        try {
            $check = $this->common->checkFields(FastConsumptionRequest::getCheckRules()
                , FastConsumptionRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('businessEnregister', $this->kernel, $aes_key);
            $bizReqJson = FastConsumptionRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['businessEnregisterUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }


    /**
     * lfk
     * @Desc 冻结（解冻）账户接口
     * @DATA 2021年6月21日下午2:02:09
     */
    public function frozenAccount($model)
    {
        try {
            $check = $this->common->checkFields(FrozenAccountRequest::getCheckRules()
                , FrozenAccountRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('frozenAccount', $this->kernel, $aes_key);
            $bizReqJson = FrozenAccountRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['frozenAccountUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }


}
<?php

namespace Yspay\Yzt\SDK;


use Exception;
use Yspay\SDK\Model\DivsionOrderQueryRequest;
use Yspay\SDK\Model\EtpRechargeRegisterRequest;
use Yspay\SDK\Model\RechargeBusinessEnregisterRequest;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class Recharge
{


    public $common;
    protected $kernel;

    public function __construct($kernel)
    {
        $this->common = new Common($kernel);
        $this->kernel = $kernel;
    }


    /**
     * lfk
     * @Desc 提现 充值申请 （businesType： 01充值；02提现）
     * @DATA 2021年6月21日下午2:02:09
     */
    public function rechargeAndWithdrawBusinessEnregister($model)
    {
        try {
            $check = $this->common->checkFields(RechargeBusinessEnregisterRequest::getCheckRules()
                , RechargeBusinessEnregisterRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('businessEnregister', $this->kernel, $aes_key);

            $bizReqJson = RechargeBusinessEnregisterRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['businessEnregisterUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();
            return $responses;
        }
    }


    /**
     * lfk
     * @Desc 企业充值申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function etpRechargeRegister($model)
    {
        try {
            $check = $this->common->checkFields(EtpRechargeRegisterRequest::getCheckRules()
                , EtpRechargeRegisterRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('businessEnregister', $this->kernel, $aes_key);
            $bizReqJson = EtpRechargeRegisterRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['etpRechargeRegisterUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();
            return $responses;
        }
    }


}
<?php

namespace Yspay\Yzt\SDK;


use Exception;
use Yspay\SDK\Model\BusinessConfirmRequest;
use Yspay\SDK\Model\WalletBalanceRequest;
use Yspay\SDK\Model\WalletBusinessEnregisterRequest;
use Yspay\SDK\Model\WalletPayQrCodeRequest;
use Yspay\SDK\Model\WalletScanQrCodeRequest;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class Wallet
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
     * @Desc 钱包余额查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function walletBalance($model)
    {
        try {
            $check = $this->common->checkFields(WalletBalanceRequest::getCheckRules()
                , WalletBalanceRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('walletBalance', $this->kernel, $aes_key);
            $bizReqJson = WalletBalanceRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['walletBalanceUrl'];
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
     * @Desc 钱包消费申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function walletBusinessEnregister($model)
    {
        try {
            $check = $this->common->checkFields(WalletBusinessEnregisterRequest::getCheckRules()
                , WalletBusinessEnregisterRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('walletBalance', $this->kernel, $aes_key);
            $bizReqJson = WalletBusinessEnregisterRequest::build($this->kernel, $model);

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
     * @Desc 消费充值提现确认
     * @DATA 2021年6月21日下午2:02:09
     */
    public function businessConfirm($model)
    {
        try {
            $check = $this->common->checkFields(BusinessConfirmRequest::getCheckRules()
                , BusinessConfirmRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('businessConfirm', $this->kernel, $aes_key);
            $bizReqJson = BusinessConfirmRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['businessConfirmUrl'];
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
     * @Desc 钱包付款码（申码）
     * @DATA 2021年6月21日下午2:02:09
     */
  /*  public function walletPayQrCode($model)
    {
        try {
            $check = $this->common->checkFields(WalletPayQrCodeRequest::getCheckRules()
                , WalletPayQrCodeRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('walletPayQrCode', $this->kernel, $aes_key);
            $bizReqJson = array(
                "appSecret" => $this->kernel->appSecret,
                "appUserCode" => $model->appUserCode,
                "orderId" => $model->orderId,
                "qrCodeType" => $model->qrCodeType,
                "cardToken" => $model->cardToken,

            );
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['walletPayQrCodeUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }*/


    /**
     * lfk
     * @Desc 钱包付款码（反扫支付申请）
     * @DATA 2021年6月21日下午2:02:09
     */
  /*  public function walletScanQrCode($model)
    {
        try {
            $check = $this->common->checkFields(WalletScanQrCodeRequest::getCheckRules()
                , WalletScanQrCodeRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('scanQrCode', $this->kernel, $aes_key);
            $bizReqJson = array(
                "appSecret" => $this->kernel->appSecret,
                "appUserCode" => $model->appUserCode,
                "amount" => $model->amount,
                "authCode" => $model->authCode,
                "orderId" => $model->orderId,
                "merchantId" => $model->merchantId,
                "merchantName" => $model->merchantName,
                "subject" => $model->subject,
                "note" => $model->note,
                "bgUrl" => $model->bgUrl,

            );
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['scanQrCodeUrl'];
            var_dump($headParams);
            return $this->common->post_Url($url, $headParams, false, $aes_key);
        } catch (Exception $e) {
            $responses = new Response();
            $responses->code = $this->common->param['errorCode'];
            $responses->msg = $e->getMessage();;
            return $responses;
        }
    }*/



}
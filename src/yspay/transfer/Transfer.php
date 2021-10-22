<?php

namespace Yspay\Yzt\SDK;


use Exception;
use Yspay\SDK\Model\EBillDownloadRequest;
use Yspay\SDK\Model\TransferPayConfirmRequset;
use Yspay\SDK\Model\TransferPayRegisterRequest;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class Transfer
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
     * @Desc 内部转账申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function transferPayRegister($model)
    {
        try {
            $check = $this->common->checkFields(TransferPayRegisterRequest::getCheckRules()
                , TransferPayRegisterRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('transferPayRegister', $this->kernel, $aes_key);

            $bizReqJson = TransferPayRegisterRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['transferPayRegisterUrl'];
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
     * @Desc 内部转账确认
     * @DATA 2021年6月21日下午2:02:09
     */
    public function transferPayConfirm($model)
    {
        try {
            $check = $this->common->checkFields(TransferPayConfirmRequset::getCheckRules()
                , TransferPayConfirmRequset::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('transferPayRegister', $this->kernel, $aes_key);

            $bizReqJson = TransferPayConfirmRequset::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['transferPayConfirmUrl'];
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
     * @Desc 转账电子回单
     * @DATA 2021年6月21日下午2:02:09
     */
    public function eBillDownload($model)
    {
        try {
            $check = $this->common->checkFields(EBillDownloadRequest::getCheckRules()
                , EBillDownloadRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('eBillDownload', $this->kernel, $aes_key);

            $bizReqJson = EBillDownloadRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['innerTransferBillUrl'];
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
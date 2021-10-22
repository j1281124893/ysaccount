<?php

namespace Yspay\Yzt\SDK;


use Exception;
use Yspay\SDK\Model\BindingBankCardRequest;
use Yspay\SDK\Model\MerchantReportQueryRequest;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\SDK\Model\MerchantRegistryRequest;
use Yspay\SDK\Model\MerchantReportRequest;
use Yspay\SDK\Model\MerchantRequest;
use Yspay\SDK\Model\UploadPictureRequest;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class Merchant
{


    public $common;
    protected $kernel;

    public function __construct($kernel)
    {
        $this->common = new Common($kernel);
        $this->kernel = $kernel;
    }


    /**
     * @Desc 获取token
     * @DATA 2021年6月21日下午2:02:09
     */
    public function getYsToken($model)
    {
        try {
            $check = $this->common->checkFields(MerchantRequest::getCheckRules()
                , MerchantRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('getYsToken', $this->kernel, $aes_key);
            $bizReqJson = MerchantRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['getYsTokenUrl'];
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
     * @Desc 上传图片
     * @DATA 2021年6月21日下午2:02:09
     */
    public function uploadPicture($model)
    {
        try {
            $check = $this->common->checkFields(UploadPictureRequest::getCheckRules()
                , UploadPictureRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('uploadPicture', $this->kernel, $aes_key);
            $headParams['appSecret'] = $this->kernel->appSecret;
            $headParams['userCode'] = $model->userCode;
            $headParams['picType'] = $model->picType;
            $headParams['token'] = $model->token;
            $filePath = $this->common->str_to_utf8($model->filePath);
            $filename = $this->common->str_to_utf8($model->filename);

            $curl_file = curl_file_create(iconv('utf-8', 'gbk', $filePath), 'image/jpeg', $filename);
            ksort($headParams);
            $signStr = $this->common->signSort($headParams);
            $sign = $this->common->sign_encrypt(array('data' => $signStr));
            $headParams['sign'] = trim($sign['check']);
            $headParams['file'] = $curl_file;
            $url = $this->kernel->url . $this->common->param['uploadPictureUrl'];
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
     * @Desc 查询进件商户
     * @DATA 2021年6月21日下午2:02:09
     */
    public function queryMerRegistry($model)
    {
        try {
            $check = $this->common->checkFields(MerchantRequest::getCheckRules()
                , MerchantRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();

            $headParams = $this->common->commonHeads('merchant/registry', $this->kernel, $aes_key);
            $bizReqJson = MerchantRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['queryMerchantUrl'];
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
     * @Desc 商户进件
     * @DATA 2021年6月21日下午2:02:09
     */
    public function channel1Report($model)
    {
        try {
            $check = $this->common->checkFields(MerchantRegistryRequest::getCheckRules()
                , MerchantRegistryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('channelReport', $this->kernel, $aes_key);
            $bizReqJson = MerchantRegistryRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['merchantRegistryUrl'];
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
     * @Desc 商户报备
     * @DATA 2021年6月21日下午2:02:09
     */
    public function merchantReport($model)
    {
        try {
            $check = $this->common->checkFields(MerchantReportRequest::getCheckRules()
                , MerchantReportRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('channelReport', $this->kernel, $aes_key);
            $bizReqJson = MerchantRegistryRequest::build($this->kernel, $model);

            $bizReqJson = $this->common->unsetArry($bizReqJson);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['merchantReportUrl'];
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
     * @Desc 商户报备查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function merchantReportQuery($model)
    {
        try {
            $check = $this->common->checkFields(MerchantReportQueryRequest::getCheckRules()
                , MerchantReportQueryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('queryReportResult', $this->kernel, $aes_key);
            $bizReqJson = MerchantReportQueryRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['merchantReportQueryUrl'];
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


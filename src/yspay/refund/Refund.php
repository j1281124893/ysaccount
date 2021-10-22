<?php

namespace Yspay\Yzt\SDK;


use Exception;
use Yspay\SDK\Model\RefundRequest;
use Yspay\SDK\Model\RefundSearchRequset;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class Refund
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
     * @Desc 退款
     * @DATA 2021年6月21日下午2:02:09
     */
    public function refund($model)
    {
        try {
            $check = $this->common->checkFields(RefundRequest::getCheckRules()
                , RefundRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('refund', $this->kernel, $aes_key);
            $bizReqJson = RefundRequest::build($this->kernel, $model);

            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['refundUrl'];
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
     * @Desc 退款查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function refundSearch($model)
    {
        try {
            $check = $this->common->checkFields(RefundSearchRequset::getCheckRules()
                , RefundSearchRequset::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('refundSearch', $this->kernel, $aes_key);

            $bizReqJson = RefundSearchRequset::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['refundSearchUrl'];
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
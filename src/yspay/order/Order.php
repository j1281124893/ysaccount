<?php

namespace Yspay\Yzt\SDK;


use Exception;
use Yspay\SDK\Model\DivsionOrderQueryRequest;
use Yspay\SDK\Model\SearchDetailOfOrderRequest;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class Order
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
     * @Desc 订单状态查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function searchDetailOfOrder($model)
    {
        try {
            $check = $this->common->checkFields(SearchDetailOfOrderRequest::getCheckRules()
                , SearchDetailOfOrderRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('searchDetailOfOrder', $this->kernel, $aes_key);

            $bizReqJson = SearchDetailOfOrderRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['searchDetailOfOrderUrl'];
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
     * @Desc 订单分账信息查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function divsionOrderQuery($model)
    {
        try {
            $check = $this->common->checkFields(DivsionOrderQueryRequest::getCheckRules()
                , DivsionOrderQueryRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('divsionOrderQuery', $this->kernel, $aes_key);

            $bizReqJson = DivsionOrderQueryRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['divisionOrderQueryUrl'];
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
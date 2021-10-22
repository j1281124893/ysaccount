<?php

include_once "../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Yspay\SDK\Model\RefundRequest;
use Yspay\SDK\Model\RefundSearchRequset;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;


class RefundTest extends TestCase
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }
    /**
     *退款查询
     */
    public function testRefundSearch()
    {
        try {
            $request = new RefundSearchRequset();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->refundOrderId = "202107141234";
            $request->orderId = "20210714123";

            $response = Factory::refundClient()->refundClass()->refundSearch($request);
            var_dump($response);
            $responseChecker = new ResponseChecker();
            //3. 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败，原因：" . $response->msg;
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }


    /**
     *退款
     */
    public function testRefund()
    {
        try {
            $request = new RefundRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->refundOrderId = "20210714123";
            $request->refundAmount = "0.01";
            $request->orderId = "202107201231";
            $request->note = "";

            $response = Factory::refundClient()->refundClass()->refund($request);
            var_dump($response);
            $responseChecker = new ResponseChecker();
            //3. 处理响应或异常
            if ($responseChecker->success($response)) {
                echo "调用成功" . PHP_EOL;
            } else {
                echo "调用失败，原因：" . $response->msg;
            }
        } catch (Exception $e) {
            echo "调用失败，" . $e->getMessage() . PHP_EOL;;
        }

    }
}
<?php

include_once "../../vendor/autoload.php";
use PHPUnit\Framework\TestCase;

use Yspay\SDK\Model\DivsionOrderQueryRequest;
use Yspay\SDK\Model\SearchDetailOfOrderRequest;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;


class OrderTest extends TestCase
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }

    /**
     *订单状态查询
     */
    public function testSearchDetailOfOrder()
    {
        try {
            $request = new SearchDetailOfOrderRequest();
            $request->appUserCode = "liuzhilin123";
            $request->orderId = "202107201232";
            $response = Factory::orderClient()->orderClass()->searchDetailOfOrder($request);
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
     *订单分账信息查询
     */
    public function testDivsionOrderQuery()
    {
        try {
            $request = new DivsionOrderQueryRequest();
            $request->accountDate = "20210630";
            $response = Factory::orderClient()->orderClass()->divsionOrderQuery($request);
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
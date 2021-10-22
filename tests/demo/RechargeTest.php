<?php

include_once "../../vendor/autoload.php";
use PHPUnit\Framework\TestCase;

use Yspay\SDK\Model\EtpRechargeRegisterRequest;
use Yspay\SDK\Model\RechargeBusinessEnregisterRequest;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;


class RechargeTest extends TestCase
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }

    /**
     *充值申请、充值提现
     */
    public function testRechargeAndWithdrawBusinessEnregister()
    {
        try {
            $request = new RechargeBusinessEnregisterRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "liuzhilin123";
            $request->amount = "0.01";
            $request->orderId = "20131241";
            $request->bankType = "";
            $request->flag = "";
            $request->businesType = "01";
            $request->note = "";
            $request->cardToken = "260378002020210705";
            $response = Factory::rechargeClient()->rechargeClass()->rechargeAndWithdrawBusinessEnregister($request);
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
     *企业充值申请
     */
    public function testEtpRechargeRegister()
    {
        try {
            $request = new EtpRechargeRegisterRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "hyfz_test2";
            $request->amount = "";
            $request->orderId = "";
            $request->bankType = "";
            $request->notifyUrl = "";
            $request->flag = "A4";
            $request->note = "";
            $response = Factory::rechargeClient()->rechargeClass()->etpRechargeRegister($request);
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
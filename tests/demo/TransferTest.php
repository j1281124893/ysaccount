<?php

include_once "../../vendor/autoload.php";
use PHPUnit\Framework\TestCase;
use Yspay\SDK\Model\EBillDownloadRequest;
use Yspay\SDK\Model\TransferPayConfirmRequset;
use Yspay\SDK\Model\TransferPayRegisterRequest;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;


class TransferTest extends TestCase
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }


    /**
     *转账电子回单
     */
    public function testEBillDownload()
    {
        try {
            $request = new EBillDownloadRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "liuzhilin123";
            $request->orderId = "202107201234";

            $response = Factory::transferClient()->transferClass()->eBillDownload($request);
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
     *内部转账申请
     */
    public function testTransferPayRegister()
    {
        try {
            $request = new TransferPayRegisterRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->payerUserCode = "";
            $request->payerName = "";
            $request->payeeUserCode = "";
            $request->payeeName = "";
            $request->businesType = "00";
            $request->orderId = "";
            $request->amount = "0.01";
            $request->note = "说明";

            $response = Factory::transferClient()->transferClass()->transferPayRegister($request);
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
     *内部转账确认
     */
    public function testTransferPayConfirm()
    {
        try {
            $request = new TransferPayConfirmRequset();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->payerUserCode = "liuzhilin123";
            $request->sn = "";
            $request->verificationCode = "";
            $request->businesType = "00";

            $response = Factory::transferClient()->transferClass()->transferPayConfirm($request);
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
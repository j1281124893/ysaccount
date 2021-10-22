<?php
include_once "../../vendor/autoload.php";
use PHPUnit\Framework\TestCase;

use Yspay\SDK\Model\BusinessConfirmRequest;
use Yspay\SDK\Model\WalletBalanceRequest;
use Yspay\SDK\Model\WalletBusinessEnregisterRequest;
use Yspay\SDK\Model\WalletPayQrCodeRequest;
use Yspay\SDK\Model\WalletScanQrCodeRequest;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;


class WalletTest extends TestCase
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }


    /**
     * @Desc 钱包余额查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testGetYsToken()
    {
        try {
            $request = new WalletBalanceRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $response = Factory::walletClient()->walletClass()->walletBalance($request);

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
     * @Desc 钱包消费申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testWalletBalance()
    {
        try {
            $request = new WalletBusinessEnregisterRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->amount = "0.01";
            $request->orderId = "";
            $request->merchantId = "";
            $request->merchantName = "";
            $request->businesType = "03";
            $request->tranBissType = "1";
            $request->note = "测试钱包消费";
            $response = Factory::walletClient()->walletClass()->walletBusinessEnregister($request);

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
     * @Desc 钱包付款码（申码）
     * @DATA 2021年6月21日下午2:02:09
     */
   /* public function testWalletPayQrCode()
    {
        try {
            $request = new WalletPayQrCodeRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "liuzhilin123";
            $request->orderId = "";
            $request->qrCodeType = "";
            $request->cardToken = "";
            $response = Factory::walletClient()->walletClass()->walletPayQrCode($request);

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

    }*/


    /**
     * @Desc 钱包付款码（反扫支付申请）
     * @DATA 2021年6月21日下午2:02:09
     */
  /*  public function testWalletScanQrCode()
    {
        try {
            $request = new WalletScanQrCodeRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->orderId = "";
            $request->amount = "0.01";
            $request->authCode = "";
            $request->merchantId = "";
            $request->merchantName = "";
            $request->subject = "测试钱包付款码";
            $request->note = "备注";
            $request->bgUrl = "123";
            $response = Factory::walletClient()->walletClass()->walletScanQrCode($request);

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

    }*/


    /**
     * @Desc 消费充值提现确认
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testBusinessConfirm()
    {
        try {
            $request = new BusinessConfirmRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->sn = "";
            $request->verificationCode = "";
            $request->businesType = "01";
            $request->flag = "A1";

            $response = Factory::walletClient()->walletClass()->businessConfirm($request);

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
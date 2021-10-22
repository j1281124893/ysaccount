<?php
include_once "../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;
use Yspay\SDK\Model\ApplyAccountRequest;
use Yspay\SDK\Model\FastConsumptionRequest;
use Yspay\SDK\Model\FrozenAccountRequest;
use Yspay\SDK\Model\RegisterMobileBindRequset;
use Yspay\SDK\Model\VerificationCodeRequest;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;
use Yspay\SDK\Model\GetGetAccountInfoRequest;


class UserTest extends TestCase
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }

    /**
     * @Desc 用户开户流程
     * @DATA 2021年7月29日下午2:02:09
     */
    public function testUserAccount()
    {
        //1注册用户
        $appUserCode = 'test001';
        $request = new ApplyAccountRequest();
        $request->appUserCode = $appUserCode;
        $request->userType = "00";
        $request->accessTerminal = "00";
        $request->name = "";
        $request->certifiType = "00";
        $request->certifiNo = "";
        $request->expansion = "sbh0011";
        $response = Factory::userClient()->userClass()->applyAccount($request);

        //2获取手机验证码
        $request = new VerificationCodeRequest();
        $request->appUserCode = $appUserCode;
        $request->mobile = "";
        $request->flag = "A1";
        $request->funcode = "B1";
        $response = Factory::userClient()->userClass()->verificationCode($request);

        //3用户绑定手机号
        $request = new RegisterMobileBindRequset();
        $request->appUserCode = $appUserCode;
        $request->mobile = "";
        $request->verificationCode = "";
        $request->flag = "A1";
        $response = Factory::userClient()->userClass()->registerMobileBind($request);

    }


    /**
     * @Desc 用户信息查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testAetAccountInfo()
    {
        try {
            $request = new GetGetAccountInfoRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $response = Factory::userClient()->userClass()->getAccountInfo($request);

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
     * @Desc 用户开户
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testGetYsToken()
    {
        try {
            $request = new ApplyAccountRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->userType = "00";
            $request->accessTerminal = "00";
            $request->name = "";
            $request->certifiType = "00";
            $request->certifiNo = "";
            $request->expansion = "";
            $response = Factory::userClient()->userClass()->applyAccount($request);

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
     * @Desc 注册手机号绑定
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testRegisterMobileBind()
    {
        try {
            $request = new RegisterMobileBindRequset();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->mobile = "";
            $request->verificationCode = "";
            $request->flag = "A1";
            $response = Factory::userClient()->userClass()->registerMobileBind($request);

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
     * @Desc 修改注册手机号
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testRegisterMobileModify()
    {
        try {
            $request = new RegisterMobileModifyRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->mobile = "";
            $request->verificationCode = "";
            $request->newMobile = "";
            $request->flag = "A1";
            $response = Factory::userClient()->userClass()->registerMobileModify($request);

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
     * @Desc 手机验证码
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testVerificationCode()
    {
        try {
            $request = new VerificationCodeRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->mobile = "";
            $request->flag = "A1";
            $request->funcode = "B2";
            $response = Factory::userClient()->userClass()->verificationCode($request);

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
     * @Desc 快捷消费申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testFastConsumption()
    {
        try {
            $request = new FastConsumptionRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "liuzhilin123";
            $request->amount = "";
            $request->cardToken = "";
            $request->orderId = "";
            $request->merchantId = "";
            $request->merchantName = "";
            $request->businesType = "";
            $request->tranBissType = "";
            $request->subject = "";
            $request->note = "订单备注";

            $response = Factory::userClient()->userClass()->fastConsumption($request);

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
     * @Desc 冻结（解冻）账户接口
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testFrozenAccount()
    {
        try {
            $request = new FrozenAccountRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "liuzhilin123";
            $request->type = "01";

            $response = Factory::userClient()->userClass()->frozenAccount($request);

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
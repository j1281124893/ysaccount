<?php
include_once "../../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

use Yspay\SDK\Model\BindingBankCardRequest;
use Yspay\SDK\Model\CardInformationRequest;
use Yspay\SDK\Model\ConfirmAndBindingCardRequest;
use Yspay\SDK\Model\UnbindBankCard;
use Yspay\SDK\Model\UserBindingCardListRequest;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;


class BindCarTest extends TestCase
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }

    /**
     * @Desc 绑定银行卡申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testbindingBankCard()
    {
        try {
            $request = new BindingBankCardRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->mobile = "";
            $request->bankAccountNo = "";
            $request->validTimeEnd = "";
            $request->cvv = "";
            $request->flag = "";
            $response = Factory::bindCarClient()->bindCarClass()->bindingBankCard($request);

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
     * @Desc 卡bin查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testCardInformation()
    {
        try {
            $request = new CardInformationRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->bankAccountNo = "";
            $response = Factory::bindCarClient()->bindCarClass()->cardInformation($request);

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
     * @Desc 银行卡绑定确认
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testConfirmAndBindingCard()
    {
        try {
            $request = new ConfirmAndBindingCardRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->sn = "1234";
            $request->smsCode = "123456";
            $response = Factory::bindCarClient()->bindCarClass()->confirmAndBindingCard($request);

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
     * @Desc 查询用户绑定银行卡
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testuserBindingCardList()
    {
        try {
            $request = new UserBindingCardListRequest();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $response = Factory::bindCarClient()->bindCarClass()->userBindingCardList($request);

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
     * @Desc 解绑绑银行卡
     * @DATA 2021年6月21日下午2:02:09
     */
    public function testUnbindBankCard()
    {
        try {
            $request = new UnbindBankCard();
            $request->appSecret = "sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f";
            $request->appUserCode = "";
            $request->cardToken = "";
            $response = Factory::bindCarClient()->bindCarClass()->unbindBankCard($request);

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
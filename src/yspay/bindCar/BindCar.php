<?php

namespace Yspay\Yzt\SDK;


use Exception;
use Yspay\SDK\Model\CardInformationRequest;
use Yspay\Yzt\SDK\Kernel\Common;
use Yspay\SDK\Model\BindingBankCardRequest;
use Yspay\SDK\Model\ConfirmAndBindingCardRequest;
use Yspay\SDK\Model\UnbindBankCard;
use Yspay\SDK\Model\UserBindingCardListRequest;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;

include_once dirname(dirname(__FILE__)) . '\Common.php';

class BindCar
{


    public $common;
    protected $kernel;

    public function __construct($kernel)
    {
        $this->common = new Common($kernel);
        $this->kernel = $kernel;
    }


    /**
     * LFK
     * @Desc 绑定银行卡申请
     * @DATA 2021年6月21日下午2:02:09
     */
    public function bindingBankCard($model)
    {
        try {
            $check = $this->common->checkFields(BindingBankCardRequest::getCheckRules()
                , BindingBankCardRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('bindingBankCard', $this->kernel, $aes_key);
            $bizReqJson = BindingBankCardRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['bindingBankCardUrl'];
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
     * LFK
     * @Desc 绑定银行卡验证
     * @DATA 2021年6月21日下午2:02:09
     */
    public function confirmAndBindingCard($model)
    {
        try {
            $check = $this->common->checkFields(ConfirmAndBindingCardRequest::getCheckRules()
                , ConfirmAndBindingCardRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('confirmAndBindingCard', $this->kernel, $aes_key);

            $bizReqJson = ConfirmAndBindingCardRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['confirmAndBindingCardUrl'];
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
     * LFK
     * @Desc 查询用户绑定银行卡
     * @DATA 2021年6月21日下午2:02:09
     */
    public function userBindingCardList($model)
    {
        try {
            $check = $this->common->checkFields(UserBindingCardListRequest::getCheckRules()
                , UserBindingCardListRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('userBindingCardList', $this->kernel, $aes_key);

            $bizReqJson = UserBindingCardListRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['userBindingCardListUrl'];
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
     * LFK
     * @Desc 解绑绑银行卡
     * @DATA 2021年6月21日下午2:02:09
     */
    public function unbindBankCard($model)
    {
        try {
            $check = $this->common->checkFields(UnbindBankCard::getCheckRules()
                , UnbindBankCard::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('unbindBankCard', $this->kernel, $aes_key);

            $bizReqJson = UnbindBankCard::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['unbindBankCardUrl'];
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
     * LFK
     * @Desc 卡bin查询
     * @DATA 2021年6月21日下午2:02:09
     */
    public function cardInformation($model)
    {
        try {
            $check = $this->common->checkFields(CardInformationRequest::getCheckRules()
                , CardInformationRequest::getParam($model));//数据校验
            if ($check->checkFlag != true) {
                return $check;
            }
            $aes_key = $this->common->randomKey();
            $headParams = $this->common->commonHeads('cardInfomation', $this->kernel, $aes_key);
            $bizReqJson = array(
                "appSecret" => $this->kernel->appSecret,
                "appUserCode" => $model->appUserCode,
                "bankAccountNo" => $model->bankAccountNo,
            );
            $bizReqJson = CardInformationRequest::build($this->kernel, $model);
            $headParams = $this->common->encodeParams($headParams, $bizReqJson, $aes_key);
            $url = $this->kernel->url . $this->common->param['cardInformationUrl'];
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
<?php

namespace Yspay\Yzt\SDK\Kernel;

use Exception;
use Yspay\Yzt\SDK\Payment\Common\Models\Response;


class Common
{
    public $param;
    private $kernel;

    /**
     * 构造函数
     *
     * @access  public
     * @param
     * @return void
     */
    function __construct($kernel)
    {
        $this->build();
        $this->kernel = $kernel;
    }

    /**
     * 实例化固定参数值
     */
    function build()
    {

        $this->param = array();

        $this->param['unknowCode'] = 'unknow';
        $this->param['unknowMsg'] = '网络异常，状态未知';

        $this->param['fail'] = 'fail';
        $this->param['failMsg'] = '网络异常，此请求为失败';

        $this->param['sign_fail'] = '签名失败，请检查证书文件是否存在，密码是否正确';
        $this->param['sign_verify'] = '验签失败，请检查证书文件是否存在';
        $this->param['errorCode'] = '500';


        //商户
        $this->param['getYsTokenUrl'] = '/api/getYsToken';
        $this->param['uploadPictureUrl'] = '/api/uploadPicture';

        $this->param['queryMerchantUrl'] = '/api/query/merchant/registry';
        $this->param['merchantRegistryUrl'] = '/api/merchant/registry';

        $this->param['merchantReportUrl'] = '/api/channelReport';
        $this->param['merchantReportQueryUrl'] = '/api/queryReportResult';

        //用户
        $this->param['applyAccountUrl'] = '/api/applyAccount';
        $this->param['getAccountInfoUrl'] = '/api/getAccountInfo';
        $this->param['registerMobileBindUrl'] = '/api/registerMobileBind';
        $this->param['verificationCodeUrl'] = '/api/verificationCode';
        $this->param['registerMobileModifyUrl'] = '/api/registerMobileModify';
        $this->param['frozenAccountUrl'] = '/api/frozenAccount';

        //绑卡
        $this->param['bindingBankCardUrl'] = '/api/bindingBankCard';
        $this->param['confirmAndBindingCardUrl'] = '/api/confirmAndBindingCard';
        $this->param['userBindingCardListUrl'] = '/api/userBindingCardList';
        $this->param['unbindBankCardUrl'] = '/api/unbindBankCard';
        $this->param['cardInformationUrl'] = '/api/cardInformation';

        //充值
        $this->param['etpRechargeRegisterUrl'] = '/api/etpRechargeRegister';

        //钱包
        $this->param['walletBalanceUrl'] = '/api/walletBalance';
        $this->param['businessEnregisterUrl'] = '/api/businessEnregister';
        $this->param['businessConfirmUrl'] = '/api/businessConfirm';
        $this->param['walletPayQrCodeUrl'] = '/api/wallet/pay/qrCode';
        $this->param['scanQrCodeUrl'] = '/api/scan/qrCode';

        //订单
        $this->param['searchDetailOfOrderUrl'] = '/api/trust-yspay/searchDetailOfOrder';
        $this->param['divisionOrderQueryUrl'] = '/api/divsionOrderQuery';

        //退款
        $this->param['refundUrl'] = '/api/trust-yspay/refund';
        $this->param['refundSearchUrl'] = '/api/trust-yspay/refundSearch';

        //转账
        $this->param['transferPayRegisterUrl'] = '/api/transferPayRegister';
        $this->param['transferPayConfirmUrl'] = '/api/transferPayConfirm';
        $this->param['innerTransferBillUrl'] = '/api/eBillDownload';

    }

    //去除为空的参数
    public function unsetArry($bizReqJson)
    {
        foreach ($bizReqJson as $k => $v) {
            if (is_null($v) || $v === '')
                unset($bizReqJson[$k]);
        }
        return $bizReqJson;
    }

    //加签排序
    public function signSort($headParams)
    {
        $signStr = "";
        foreach ($headParams as $key => $val) {
            $signStr .= $key . '=' . $val . '&';
        }
        return rtrim($signStr, '&');
    }


    //验签排序
    public function attestationSignSort($headParams)
    {
        $signStr = "";
        foreach ($headParams as $key => $val) {
            if ($key == "msg"
                || $key == "timeStamp"
                || $key == "norce"
                || $key == "data"
                || $key == "code") {
                $val = substr($val, 1, -1);
            }

            $signStr .= $key . '=' . $val . '&';
        }
        return rtrim($signStr, '&');
    }


    /**
     * post发送请求
     *
     * @param $url
     * @param $headParams
     * @param $flag
     * @param $aeskey
     * @return Response
     */
    function post_url($url, $headParams, $flag, $aeskey)
    {
        //echo PHP_EOL. "渠道请求参数" . stripslashes(json_encode($headParams,JSON_UNESCAPED_UNICODE)).PHP_EOL;
        $responses = new Response();
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        //上传图片不需要改变格式
        if (strpos($url,$this->param['uploadPictureUrl'])) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $headParams);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($headParams));
        }
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        //var_dump(PHP_EOL."POST请求响应信息".$response.PHP_EOL);
        if (curl_errno($ch)) {
            $curl_errno = curl_errno($ch);
            var_dump($curl_errno);
            curl_close($ch);
            //echo "请求失败";
            if ($flag) {
                $responses->code = $this->param['unknow'];
                $responses->msg = $this->param['unknowMsg'];
                return $responses;
            }
            $responses->code = $this->param['fail'];
            $responses->msg = $this->param['failMsg'];
            return $responses;
        } else {
            $autoChangeCode = $this->autoChangeCode($response);
            $response = json_decode(base64_decode($autoChangeCode), true);
            //echo PHP_EOL. "渠道响应报文" . stripslashes(json_encode($response,JSON_UNESCAPED_UNICODE)) . PHP_EOL;
            if ($response["sign"] != null) {
                $sign = $response["sign"];
                $datas = array();
                $datas["msg"] = stripslashes(json_encode($response["msg"], JSON_UNESCAPED_UNICODE));
                $datas["timeStamp"] = stripslashes(json_encode($response['timeStamp'], JSON_UNESCAPED_UNICODE));
                $datas["norce"] = stripslashes(json_encode($response['norce'], JSON_UNESCAPED_UNICODE));
                $datas["code"] = stripslashes(json_encode($response['code'], JSON_UNESCAPED_UNICODE));
                if (isset($response["data"])) {
                    $datas["data"] = stripslashes(json_encode($response["data"], JSON_UNESCAPED_UNICODE));
                }
                ksort($datas);
                $data = $this->attestationSignSort($datas);

                // 验证签名 仅作基础验证
                if ($this->sign_check($sign, $data) == true) {
                    //var_dump("验证签名成功!");
                    if (isset($response['data'])) {
                        $response['data'] = $this->msgAesDecrypt($response['data'], $aeskey);
                    }

                    return Response::fromMap($response);
                } else {
                    //var_dump('验证签名失败!');
                    $responses->code = $this->param['errorCode'];
                    $responses->msg = $this->param['sign_verify'];
                    return $responses;
                }
            }
        }
    }

    /**
     * 转码
     */
    function str_to_utf8 ($str = '') {

        $current_encode = mb_detect_encoding($str, array("ASCII","GB2312","GBK",'BIG5','UTF-8'));

        $encoded_str = mb_convert_encoding($str, 'UTF-8', $current_encode);

        return $encoded_str;

    }


    /**
     * 验签转明码
     * @param $sign 签名字符串
     * @param $data
     *
     * @return $success
     */
    function sign_check($sign, $data)
    {
       // $publickeyFile = $this->kernel->businessgatecerpath; //公钥
       // $certificateCAcerContent = file_get_contents($publickeyFile);
       // $certificateCApemContent = '-----BEGIN CERTIFICATE-----' . PHP_EOL . chunk_split(base64_encode($certificateCAcerContent), 64, PHP_EOL) . '-----END CERTIFICATE-----' . PHP_EOL;
        // print_r("验签密钥" . $certificateCApemContent);
        // 签名验证
        $success = openssl_verify($data, base64_decode($sign), openssl_get_publickey($this->kernel->publicKay), OPENSSL_ALGO_SHA256);
        return $success;
    }


    /**
     * php自动识别字符集编码并转换为目标编码（UTF-8）的方法
     * @ data     需要转换的字符集
     * @ encoding 目标编码
     **/
    function autoChangeCode($data, $encoding = 'utf-8')
    {
        if (!empty($data)) {
            $fileType = mb_detect_encoding($data, array('UTF-8', 'GBK', 'LATIN1', 'BIG5'));
            if ($fileType != $encoding) {
                $data = mb_convert_encoding($data, $encoding, $fileType);
            }
        }
        return $data;

    }


    /**
     * 签名加密
     * @param input data
     * @return Response
     * @return check
     * @return msg
     */
    function sign_encrypt($input)
    {

        try {
            $MERCHANT_PRX = $this->kernel->private_key;
            $MERCHANT_PRX_PWD = $this->kernel->pfxpassword;
            $return = array('success' => 0, 'msg' => '', 'check' => '');
            $pkcs12 = file_get_contents($MERCHANT_PRX);
            if (openssl_pkcs12_read($pkcs12, $certs, $MERCHANT_PRX_PWD)) {
                //var_dump('证书,密码,正确读取');
                $privateKey = $certs['pkey'];
                $publicKey = $certs['cert'];
                $signedMsg = "";
                // print_r("加密密钥" . $privateKey);
                //echo "加密数据" . $input['data'];
                if (openssl_sign($input['data'], $signedMsg, $privateKey, OPENSSL_ALGO_SHA256)) {
                    //echo '签名正确生成';
                    $return['success'] = 1;
                    $return['check'] = base64_encode($signedMsg);
                    $return['msg'] = base64_encode($input['data']);
                }
            }
            return $return;
        } catch (Exception $e) {
            $err = [
                'code' => $e->getCode(),
                'msg'  => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'   => $e->getLine()
            ];
            throw new Exception($this->param['sign_fail'] );
        }

    }


    function checkFields($rules, $data)
    {
        $response = new Response();
        foreach ($rules as $field => $fieldRules) {
            if (!isset($data[$field]) || iconv_strlen($data[$field],"UTF-8") <= 0) {
                $response->code = "500";
                $response->msg = "$field 不能为空";
                $response->checkFlag = false;
                return $response;
            }

        }

        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $type => $rule) {
                $ret = Validator::check($type, $data[$field], $rule);
                if ($ret == false) {

                    $response->code = "500";
                    $response->msg = "param $field 参数错误";
                    $response->checkFlag = false;
                    return $response;
                }
            }
        }
        $response->checkFlag = true;
        return $response;
    }


    //随机生成16位字符串,用于AES加密key
    public function randomKey()
    {
        $str = '0123456789ABCDEF';
        $key = '';
        for ($i = 0; $i < 16; $i++) {
            $no = mt_rand(0, 15);
            $key .= $str[$no];
        }
        return $key;
    }


    //公钥加密check
    public function checkRsaPubEncrypt($input)
    {
        $return = ['success' => 0, 'msg' => '', 'check' => ''];
        //  $certificateCApemContent = '-----BEGIN CERTIFICATE-----' . PHP_EOL . chunk_split(base64_encode($certificateCAcerContent), 64, PHP_EOL) . '-----END CERTIFICATE-----' . PHP_EOL;

       // $path = $this->kernel->businessgatecerpath;
       // $publicKey = file_get_contents($path); //公钥
       // echo $publicKey;
        if (openssl_public_encrypt($input['data'], $encrypted, openssl_get_publickey($this->kernel->publicKay), OPENSSL_PKCS1_PADDING)) { //填充方式
            $return['success'] = 1;
            $return['check'] = base64_encode($encrypted);
            $return['msg'] = base64_encode($input['data']);
        }
        return $return['check'];
    }


    //Aes加密
    public function msgAesEncode($data, $aes_key)
    {
        $str = openssl_encrypt($data, 'AES-128-ECB', $aes_key, OPENSSL_RAW_DATA);
        return base64_encode($str);
    }

    //Aes解密
    public function msgAesDecrypt($data, $aes_key)
    {
        return openssl_decrypt(base64_decode($data), 'AES-128-ECB', $aes_key, OPENSSL_RAW_DATA);
    }


    /**
     * http Heads参数组装
     */
    public function commonHeads($msgCode,$kernel,$aes_key)
    {
        $headParams = array();
        $headParams['timeStamp'] = date('Y-m-d H:i:s');
        $headParams['norce'] = md5(uniqid(microtime(true), true));
        $headParams['src'] = $kernel->src;
        $headParams['certId'] = $kernel->certId;
        $headParams['version'] = $kernel->version;
        $headParams['check'] = $this->checkRsaPubEncrypt(['data' => $aes_key]);
        $headParams['msgCode'] = $msgCode;
        return $headParams;
    }



    /**
     * 加密参数组装
     */
    public function encodeParams($headParams,$bizReqJson,$aes_key)
    {
        $bizReqJson = $this->unsetArry($bizReqJson);
        $headParams['msg'] = $this->msgAesEncode(json_encode($bizReqJson, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES), $aes_key);
        ksort($headParams);
        $signStr = $this->signSort($headParams);
        $sign = $this->sign_encrypt(array('data' => $signStr));
        $headParams['sign'] = trim($sign['check']);
        return $headParams;
    }






}
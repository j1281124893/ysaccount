<?php

include_once "../../vendor/autoload.php";

use Yspay\SDK\Model\MerchantReportQueryRequest;
use Yspay\SDK\Model\MerchantReportRequest;
use Yspay\Yzt\SDK\Base;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Util\ResponseChecker;
use Yspay\SDK\Model\MerchantRegistryRequest;
use Yspay\SDK\Model\MerchantRequest;
use Yspay\SDK\Model\UploadPictureRequest;


class MerchantTest extends Base
{

    function __construct()
    {
        parent::__construct();
        Base::instance();
    }



    /**
     *获取token
     */
    public function testGetYsToken()
    {
        try {
            $request = new MerchantRequest();
            $request->userCode = "4445454"; //商户的用户号(自定义的外部商户号)
            $response = Factory::mchClient()->mchClass()->getYsToken
            (
                $request
            );

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
     *上传图片
     */
    public function testUploadPicture()
    {
        try {
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "00";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/00.jpg"; // 本地图片地址
            $request->filename = '00.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
            var_dump($response);
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "30";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/30.jpg"; // 本地图片地址
            $request->filename = '30.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
            var_dump($response);
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "33";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/33.jpg"; // 本地图片地址
            $request->filename = '33.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
            var_dump($response);
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "34";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/34.jpg.jpg"; // 本地图片地址
            $request->filename = '34.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
            var_dump($response);
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "35";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/35.jpg"; // 本地图片地址
            $request->filename = '35.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
            var_dump($response);
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "36";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/36.jpg"; // 本地图片地址
            $request->filename = '36.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
            var_dump($response);
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "50";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/50.jpg"; // 本地图片地址
            $request->filename = '50.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
            var_dump($response);
            $request = new UploadPictureRequest();
            $request->userCode = "4445454";  //用户号
            $request->picType = "51";  // 图片类型
            $request->token = ""; // toekn值
            $request->filePath = "E:/tp/jpg/30.jpg"; // 本地图片地址
            $request->filename = '51.jpg';  // 图片名称
            $response = Factory::mchClient()->mchClass()->uploadPicture
            (
                $request
            );
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
     *查询进件商户
     */
    public function testQueryMerRegistry()
    {
        try {
            $request = new MerchantRequest();
            $request->userCode = "";
            $response = Factory::mchClient()->mchClass()->queryMerRegistry(
                $request
            );
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
     *商户进件
     */
    public function testMerchantRegistry()
    {
        try {
            $merchantRegistryRequest = new MerchantRegistryRequest();
            $merchantRegistryRequest->userCode = "4445454"; //商户用户号
            $merchantRegistryRequest->custname = "测试商户";  //商户名称
            $merchantRegistryRequest->custAnotherName = "商户简称";  //商户简称
            $merchantRegistryRequest->certifitype = "00";  //证件类型
            $merchantRegistryRequest->certifino = "";  //证件号码
            $merchantRegistryRequest->mobile = ""; //通知手机号
            $merchantRegistryRequest->email = "";  //邮箱
            $merchantRegistryRequest->notifyType = "3";  //通知类型
            $merchantRegistryRequest->custflag = "2"; //客户类型（2：个人商户(小微商户)，3：个体商户，4：企业商户，5：供应商
            $merchantRegistryRequest->province = "广东省";  //商户所在省
            $merchantRegistryRequest->city = "深圳市";  //商户所在市
            $merchantRegistryRequest->area = "龙华区";  //商户所在区
            $merchantRegistryRequest->companyAddress = "301"; //商户详细地址
            $merchantRegistryRequest->legalname = "";  //法人姓名
            $merchantRegistryRequest->certifiEffect = "";  //法人证件生效期
            $merchantRegistryRequest->certifiDate = "";  //法人证件有效期
            $merchantRegistryRequest->bankCerNo = "";  //银行预留证件号码
            $merchantRegistryRequest->banktype = "";  //银行行别
            $merchantRegistryRequest->companyNo = "";  //企业证照号码
            $merchantRegistryRequest->bsLicenseEffect = "";  //企业证件生效期
            $merchantRegistryRequest->validtime = "";  //企业营业执照有效期
            $merchantRegistryRequest->bankCity = "深圳市";  //银行所在市
            $merchantRegistryRequest->contactPhone = "";  //法人手机号码
            $merchantRegistryRequest->bankCerType = "00";  //银行预留证件类型	M
            $merchantRegistryRequest->bankAccountName = "";  //结算户名
            $merchantRegistryRequest->bankAccountType = "11";  //银行账户类型
            $merchantRegistryRequest->bankProvinc = "";  //银行所在省
            $merchantRegistryRequest->bankAccountNo = "";  //结算账号
            $merchantRegistryRequest->companyCerttype = "19";  //企业证照类型
            $merchantRegistryRequest->settleAccountType = "1";  //结算方式
            $merchantRegistryRequest->bankname = "";  //银行行名
            $merchantRegistryRequest->bankMobile = "";  //银行预留手机号
            $merchantRegistryRequest->picIds = ""; //图片ID集合：多个图片id，中间以逗号“，”分割，注意是对应图片上传接口返回的picId密文
            $response = Factory::mchClient()->mchClass()->channel1Report($merchantRegistryRequest);
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
     *商户报备
     */
    public function testMerchantReport()
    {
        try {
            $request = new MerchantReportRequest();
            $request->appUserCode = "";
            $request->appletAppid = "";
            $request->apppubAppid = "";
            $request->jsapiPath1 = "";
            $request->jsapiPath2 = "";
            $request->jsapiPath3 = "";
            $request->jsapiPath4 = "";
            $request->jsapiPath5 = "";
            $request->mercAbbrName = "";
            $request->mercName = "";
            $request->province = "";
            $request->city = "";
            $request->district = "";
            $request->contactPersonName = "";
            $request->contactPersonPhoneNo = "";
            $request->businessLicenseCode = "";
            $request->lawyerCredentialEffect = "";
            $request->lawyerCredentialExpired = "";
            $request->businessLicenseEffect = "";
            $request->businessLicenseExpired = "";
            $request->mchFlag = "";
            $request->businessAddress = "";
            $request->lawyerName = "";
            $request->lawyerCredentialId = "";
            $request->bankName = "";
            $request->accountType = "";
            $request->accountName = "";
            $request->accountNo = "";
            $response = Factory::mchClient()->mchClass()->merchantReport($request);
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
     *商户报备查询
     */
    public function testMerchantReportQuery()
    {
        try {
            $request = new MerchantReportQueryRequest();
            $request->appUserCode = "";
            $response = Factory::mchClient()->mchClass()->merchantReportQuery(
                $request
            );
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
     *商户入户流程
     */
    public function testRegister()
    {
        $userCode = 'test01';

        //1获取Token
        $request = new MerchantRequest();
        $request->userCode = $userCode; //商户的用户号(自定义的外部商户号)
        $response = Factory::mchClient()->mchClass()->getYsToken($request);
        $mchToken = json_decode($response->data, true);

        //2上传进件图片
        $request = new UploadPictureRequest();
        $request->userCode = $userCode;  //用户号
        $request->picType = "00";  // 图片类型
        $request->token = $mchToken['token']; // toekn值D:\pic\jpg
        $request->filePath = "D:/pic/jpg/demo.jpg"; // 本地图片地址
        $request->filename = 'demo.jpg';  // 图片名称
        $response = Factory::mchClient()->mchClass()->uploadPicture($request);
        $mchPic1 = json_decode($response->data, true);

        $request = new UploadPictureRequest();
        $request->userCode = $userCode;  //用户号
        $request->picType = "30";  // 图片类型
        $request->token = $mchToken['token']; // toekn值D:\pic\jpg
        $request->filePath = "D:/pic/jpg/demo.jpg"; // 本地图片地址
        $request->filename = 'demo.jpg';  // 图片名称
        $response = Factory::mchClient()->mchClass()->uploadPicture($request);
        $mchPic2 = json_decode($response->data, true);

        //3商户进件
        $merchantRegistryRequest = new MerchantRegistryRequest();
        $merchantRegistryRequest->userCode = $userCode; //商户用户号
        $merchantRegistryRequest->custname = "测试商户";  //商户名称
        $merchantRegistryRequest->custAnotherName = "测试商户";  //商户简称
        $merchantRegistryRequest->certifitype = "";  //证件类型
        $merchantRegistryRequest->certifino = "";  //证件号码
        $merchantRegistryRequest->mobile = ""; //通知手机号
        $merchantRegistryRequest->email = "";  //邮箱
        $merchantRegistryRequest->notifyType = "3";  //通知类型
        $merchantRegistryRequest->custflag = "2"; //客户类型（2：个人商户(小微商户)，3：个体商户，4：企业商户，5：供应商
        $merchantRegistryRequest->province = "";  //商户所在省
        $merchantRegistryRequest->city = "";  //商户所在市
        $merchantRegistryRequest->area = "";  //商户所在区
        $merchantRegistryRequest->companyAddress = ""; //商户详细地址
        $merchantRegistryRequest->legalname = "";  //法人姓名
        $merchantRegistryRequest->certifiEffect = "";  //法人证件生效期
        $merchantRegistryRequest->certifiDate = "";  //法人证件有效期
        $merchantRegistryRequest->bankCerNo = "";  //银行预留证件号码
        $merchantRegistryRequest->banktype = "";  //银行行别
        $merchantRegistryRequest->companyNo = "";  //企业证照号码
        $merchantRegistryRequest->bsLicenseEffect = "";  //企业证件生效期
        $merchantRegistryRequest->validtime = "";  //企业营业执照有效期
        $merchantRegistryRequest->bankCity = "";  //银行所在市
        $merchantRegistryRequest->contactPhone = "";  //法人手机号码
        $merchantRegistryRequest->bankCerType = "";  //银行预留证件类型	M
        $merchantRegistryRequest->bankAccountName = "";  //结算户名
        $merchantRegistryRequest->bankAccountType = "";  //银行账户类型
        $merchantRegistryRequest->bankProvinc = "";  //银行所在省
        $merchantRegistryRequest->bankAccountNo = "";  //结算账号
        $merchantRegistryRequest->companyCerttype = "";  //企业证照类型
        $merchantRegistryRequest->settleAccountType = "";  //结算方式
        $merchantRegistryRequest->bankname = "";  //银行行名
        $merchantRegistryRequest->bankMobile = "";  //银行预留手机号
        $merchantRegistryRequest->picIds = $mchPic1['picId'] .','. $mchPic2['picId']; //图片ID集合：多个图片id，中间以逗号“，”分割，注意是对应图片上传接口返回的picId密文
        $response = Factory::mchClient()->mchClass()->channel1Report($merchantRegistryRequest);
        var_dump($response);
    }

}

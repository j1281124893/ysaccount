<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class MerchantReportRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 商户用户号
     */
    public $appUserCode;

    public $appletAppid;
    public $apppubAppid;
    public $jsapiPath1;
    public $jsapiPath2;
    public $jsapiPath3;
    public $jsapiPath4;
    public $jsapiPath5;
    public $mercAbbrName;
    public $mercName;
    public $province;
    public $city;
    public $district;
    public $contactPersonName;
    public $contactPersonPhoneNo;
    public $email;
    public $businessLicenseCode;
    public $lawyerCredentialEffect;
    public $lawyerCredentialExpired;
    public $businessLicenseEffect;
    public $businessLicenseExpired;
    public $mchFlag;
    public $businessAddress;
    public $lawyerName;
    public $lawyerCredentialId;
    public $bankName;
    public $accountType;
    public $accountName;
    public $accountNo;


    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'appUserCode' => $model->appUserCode,
            'appletAppid' => $model->appletAppid,
            'apppubAppid' => $model->apppubAppid,
            'jsapiPath1' => $model->jsapiPath1,
            'jsapiPath2' => $model->jsapiPath2,
            'jsapiPath3' => $model->jsapiPath3,
            'jsapiPath4' => $model->jsapiPath4,
            'jsapiPath5' => $model->jsapiPath5,
            'mercAbbrName' => $model->mercAbbrName,
            'mercName' => $model->mercName,
            'province' => $model->province,
            'city' => $model->city,
            'district' => $model->district,
            'contactPersonName' => $model->contactPersonName,
            'contactPersonPhoneNo' => $model->contactPersonPhoneNo,
            'email' => $model->email,
            'businessLicenseCode' => $model->businessLicenseCode,
            'lawyerCredentialEffect' => $model->lawyerCredentialEffect,
            'lawyerCredentialExpired' => $model->lawyerCredentialExpired,
            'businessLicenseEffect' => $model->businessLicenseEffect,
            'businessLicenseExpired' => $model->businessLicenseExpired,
            'mchFlag' => $model->mchFlag,
            'businessAddress' => $model->businessAddress,
            'lawyerName' => $model->lawyerName,
            'lawyerCredentialId' => $model->lawyerCredentialId,
            'bankName' => $model->bankName,
            'accountType' => $model->accountType,
            'accountName' => $model->accountName,
            'accountNo' => $model->accountNo,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'merchantReportRequest' => [
                'appUserCode' => [
                    Validator::MAX_LEN => 30,
                ],


            ],

        );

        return $checkRules['merchantReportRequest'];
    }

    public static function build($kernel ,$model){
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            'appUserCode' => $model->appUserCode,
            'appletAppid' => $model->appletAppid,
            'apppubAppid' => $model->apppubAppid,
            'jsapiPath1' => $model->jsapiPath1,
            'jsapiPath2' => $model->jsapiPath2,
            'jsapiPath3' => $model->jsapiPath3,
            'jsapiPath4' => $model->jsapiPath4,
            'jsapiPath5' => $model->jsapiPath5,
            'mercAbbrName' => $model->mercAbbrName,
            'mercName' => $model->mercName,
            'province' => $model->province,
            'city' => $model->city,
            'district' => $model->district,
            'contactPersonName' => $model->contactPersonName,
            'contactPersonPhoneNo' => $model->contactPersonPhoneNo,
            'email' => $model->email,
            'businessLicenseCode' => $model->businessLicenseCode,
            'lawyerCredentialEffect' => $model->lawyerCredentialEffect,
            'lawyerCredentialExpired' => $model->lawyerCredentialExpired,
            'businessLicenseEffect' => $model->businessLicenseEffect,
            'businessLicenseExpired' => $model->businessLicenseExpired,
            'mchFlag' => $model->mchFlag,
            'businessAddress' => $model->businessAddress,
            'lawyerName' => $model->lawyerName,
            'lawyerCredentialId' => $model->lawyerCredentialId,
            'bankName' => $model->bankName,
            'accountType' => $model->accountType,
            'accountName' => $model->accountName,
            'accountNo' => $model->accountNo,

        );
        return $bizReqJson;
    }
}
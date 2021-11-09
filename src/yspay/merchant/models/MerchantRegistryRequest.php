<?php
namespace Yspay\SDK\Model;

use Yspay\Yzt\SDK\Kernel\Validator;

include_once dirname(dirname(dirname(__FILE__))).'\util\Validator.php';


class MerchantRegistryRequest
{

    /**
     * App密钥
     */
    public $appSecret;

    /**
     * 商户用户号
     */
    public $userCode;
    public $custname;
    public $certifitype;
    public $certifino;
    public $certifiDate;
    public $mobile;
    public $email;
    public $notifyType;
    public $custflag;
    public $legalname;
    public $bankCerNo;
    public $banktype;
    public $companyNo;
    public $validtime;
    public $bankCity;
    public $contactPhone;
    public $bankCerType;
    public $bankAccountName;
    public $bankAccountType;
    public $bankProvinc;
    public $bankAccountNo;
    public $companyCerttype;
    public $settleAccountType;
    public $bankname;
    public $bankMobile;
    public $custAnotherName;
    public $certifiEffect;
    public $province;
    public $city;
    public $area;
    public $companyAddress;
    public $bsLicenseEffect;
    public $picIds;

    public static function getParam($model)
    {

        $param = array(
            'appSecret' => $model->appSecret,
            'userCode' => $model->userCode,
            'custname' => $model->custname,
            'certifitype' => $model->certifitype,
            'certifino' => $model->certifino,
            'certifiDate' => $model->certifiDate,
            'mobile' => $model->mobile,
            'email' => $model->email,
            'notifyType' => $model->notifyType,
            'custflag' => $model->custflag,
            'legalname' => $model->legalname,
            'bankCerNo' => $model->bankCerNo,
            'banktype' => $model->banktype,
            'companyNo' => $model->companyNo,
            'validtime' => $model->validtime,
            'bankCity' => $model->bankCity,
            'contactPhone' => $model->contactPhone,
            'bankCerType' => $model->bankCerType,
            'bankAccountName' => $model->bankAccountName,
            'bankAccountType' => $model->bankAccountType,
            'bankProvinc' => $model->bankProvinc,
            'bankAccountNo' => $model->bankAccountNo,
            'companyCerttype' => $model->companyCerttype,
            'settleAccountType' => $model->settleAccountType,
            'bankname' => $model->bankname,
            'bankMobile' => $model->bankMobile,
            'custAnotherName' => $model->custAnotherName,
            'certifiEffect' => $model->certifiEffect,
            'province' => $model->province,
            'city' => $model->city,
            'area' => $model->area,
            'companyAddress' => $model->companyAddress,
            'bsLicenseEffect' => $model->bsLicenseEffect,
            'picIds' => $model->picIds,

        );

        return $param;
    }


    public static function getCheckRules()
    {

        $checkRules = array(
            'merchantRequest' => [
                'userCode' => [
                    Validator::MAX_LEN => 30,
                ],
                'custname' => [
                    Validator::MAX_LEN => 30,
                ],
                'certifitype' => [
                    Validator::MAX_LEN => 2,
                ],
                'certifino' => [
                    Validator::MAX_LEN => 20,
                ],
                'mobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'email' => [
                    Validator::MAX_LEN => 30,
                ],
                'notifyType' => [
                    Validator::MAX_LEN => 2,
                ],
                'custflag' => [
                    Validator::MAX_LEN => 2,
                ],
                'legalname' => [
                    Validator::MAX_LEN => 30,
                ],
                'certifiDate' => [
                    Validator::MAX_LEN => 8,
                ],
                'bankCerNo' => [
                    Validator::MAX_LEN => 20,
                ],
                'banktype' => [
                    Validator::MAX_LEN => 10,
                ],
                'companyNo' => [
                    Validator::MAX_LEN => 20,
                ],
                'validtime' => [
                    Validator::MAX_LEN => 8,
                ],
                'bankCity' => [
                    Validator::MAX_LEN => 20,
                ],
                'contactPhone' => [
                    Validator::MAX_LEN => 11,
                ],
                'bankCerType' => [
                    Validator::MAX_LEN => 2,
                ],
                'bankAccountName' => [
                    Validator::MAX_LEN => 30,
                ],
                'bankAccountType' => [
                    Validator::MAX_LEN => 2,
                ],
                'bankProvinc' => [
                    Validator::MAX_LEN => 30,
                ],
                'bankAccountNo' => [
                    Validator::MAX_LEN => 20,
                ],
                'companyCerttype' => [
                    Validator::MAX_LEN => 2,
                ],
                'settleAccountType' => [
                    Validator::MAX_LEN => 2,
                ],
                'bankname' => [
                    Validator::MAX_LEN => 60,
                ],
                'bankMobile' => [
                    Validator::MAX_LEN => 11,
                ],
                'picIds' => [
                ],

            ],

        );

        return $checkRules['merchantRequest'];
    }

    public static function build($kernel ,$model){
        $bizReqJson = array(
            "appSecret" => $kernel->appSecret,
            'appUserCode' => $model->appUserCode,
            'userCode' => $model->userCode,
            'custname' => $model->custname,
            'certifitype' => $model->certifitype,
            'certifino' => $model->certifino,
            'certifiDate' => $model->certifiDate,
            'mobile' => $model->mobile,
            'email' => $model->email,
            'notifyType' => $model->notifyType,
            'custflag' => $model->custflag,
            'legalname' => $model->legalname,
            'bankCerNo' => $model->bankCerNo,
            'banktype' => $model->banktype,
            'companyNo' => $model->companyNo,
            'validtime' => $model->validtime,
            'bankCity' => $model->bankCity,
            'contactPhone' => $model->contactPhone,
            'bankCerType' => $model->bankCerType,
            'bankAccountName' => $model->bankAccountName,
            'bankAccountType' => $model->bankAccountType,
            'bankProvinc' => $model->bankProvinc,
            'bankAccountNo' => $model->bankAccountNo,
            'companyCerttype' => $model->companyCerttype,
            'settleAccountType' => $model->settleAccountType,
            'bankname' => $model->bankname,
            'bankMobile' => $model->bankMobile,
            'custAnotherName' => $model->custAnotherName,
            'certifiEffect' => $model->certifiEffect,
            'province' => $model->province,
            'city' => $model->city,
            'area' => $model->area,
            'companyAddress' => $model->companyAddress,
            'bsLicenseEffect' => $model->bsLicenseEffect,
            'picIds' => $model->picIds,
            'lawyerCredentialEffect'  => $model->lawyerCredentialEffect,
            'lawyerCredentialExpired' => $model->lawyerCredentialExpired,
            'businessLicenseCode' => $model->businessLicenseCode,
            'district' => $model->district,
            'businessLicenseEffect' => $model->businessLicenseEffect,
            'businessLicenseExpired' => $model->businessLicenseExpired,
            'businessAddress' => $model->businessAddress,
            'lawyerName' => $model->lawyerName,
            'lawyerCredentialId' => $model->lawyerCredentialId,
            'accountType' => $model->accountType,
            'accountName' => $model->accountName,
            'accountNo' => $model->accountNo,

        );
        return $bizReqJson;
    }

}
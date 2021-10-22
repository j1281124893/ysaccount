<?php
namespace Yspay\Yzt\SDK;


use PHPUnit\Framework\TestCase;
use Yspay\Yzt\SDK\Factory;
use Yspay\Yzt\SDK\Kernel\Config;


class Base extends TestCase
{

    public static $Factory;

    function __construct()
    {
        parent::__construct();
        Factory::instance($this->getOptions());
    }

    public static function instance()
    {
        self::$Factory = new self();

        return self::$Factory;
    }


    function getOptions()
    {

        $options = new Config();
        //<-- 环境 prd表示生产环境,test表示测试环境 -->;
        $options->postType = 'prd';
        //<-- 加签私钥证书文件路径，已生产参数为准，当前hyfz_test2.pfx为生产测试证书 -->
        $options->private_key = dirname(__FILE__).'\cerFile\hyfz_test2.pfx';
        //<-- 签名证书密码，已生产参数为准，当前hyfz_test2.pfx为生产测试证书密码 -->
        $options->pfxpassword = "123456";
        //<-- 平台发起方商户号 -->
        $options->certId = 'hyfz_test2';
        //<-- App密钥，已生产参数为准，当前参数为生产测试App秘钥 -->
        $options->appSecret = 'sCIL97bojf66ut6jX7bLVb6aL1c53EMRC95shtt4p57B0S0o7f';
        //接口版本
        $options->version = '1.0';
        return $options;
    }


}
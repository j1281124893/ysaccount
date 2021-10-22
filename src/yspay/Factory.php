<?php

namespace Yspay\Yzt\SDK;

use Yspay\Yzt\SDK\Merchant as mchClass;
use Yspay\Yzt\SDK\User as userClass;
use Yspay\Yzt\SDK\BindCar as bindCarClass;
use Yspay\Yzt\SDK\Recharge as rechargeClass;
use Yspay\Yzt\SDK\Wallet as walletClass;
use Yspay\Yzt\SDK\Order as orderClass;
use Yspay\Yzt\SDK\Refund as refundClass;
use Yspay\Yzt\SDK\Transfer as transferClass;



class Factory
{
    public $kernel = null;
    public $factory = null;
    private static $instance;
    public static $mchClient;
    public static $userClient;
    public static $bindCarClient;
    public static $rechargeClient;
    public static $walletClient;
    public static $orderClient;
    public static $refundClient;
    public static $transferClient;

    private function __construct($config)
    {
        $postType = $config->postType;
        if (null != $config) {
            if ('test' == $postType){
                $config->url = 'http://bd4-vtest.ysepay.com';
            }else if ( 'prd' == $postType){
                $config->url = 'https://yzt.ysepay.com:8443';
            }else{
                var_dump( "环境类型不存在");
            }
        }
        self::$mchClient = new MchClient($config);
        self::$userClient = new UserClient($config);
        self::$bindCarClient = new BindCarClient($config);
        self::$rechargeClient = new RechargeClient($config);
        self::$walletClient = new WalletClient($config);
        self::$orderClient = new OrderClient($config);
        self::$refundClient = new RrefundClient($config);
        self::$transferClient = new TransferClient($config);


    }


    public static function instance($config)
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    private function __clone()
    {
    }

    public static function mchClient()
    {
        return self::$mchClient;
    }
    public static function userClient()
    {
        return self::$userClient;
    }
    public static function bindCarClient()
    {
        return self::$bindCarClient;
    }
    public static function rechargeClient()
    {
        return self::$rechargeClient;
    }

    public static function walletClient()
    {
        return self::$walletClient;
    }

    public static function orderClient()
    {
        return self::$orderClient;
    }
    public static function refundClient()
    {
        return self::$refundClient;
    }
    public static function transferClient()
    {
        return self::$transferClient;
    }


}


class MchClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function mchClass()
    {
        return new mchClass($this->kernel);
    }

}

class UserClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function userClass()
    {
        return new userClass($this->kernel);
    }

}

class BindCarClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function bindCarClass()
    {
        return new bindCarClass($this->kernel);
    }

}

class RechargeClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function rechargeClass()
    {
        return new rechargeClass($this->kernel);
    }

}

class WalletClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function walletClass()
    {
        return new walletClass($this->kernel);
    }

}

class OrderClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function orderClass()
    {
        return new orderClass($this->kernel);
    }

}

class RrefundClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function refundClass()
    {
        return new refundClass($this->kernel);
    }

}
class TransferClient
{
    private $kernel;

    public function __construct($kernel)
    {
        $this->kernel = $kernel;
    }

    public function transferClass()
    {
        return new transferClass($this->kernel);
    }

}

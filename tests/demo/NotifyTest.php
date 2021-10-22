<?php

class NotifyTest
{

    /**
     *商户进件异步通知接口
     */
    public function notifyTest()
    {
        //获取请求data参数
        $data = $_REQUEST["data"];

        //base64解密
        $decodeDate = base64_decode($data);
        $json_decode = json_decode($decodeDate, true);

        //返回参数封装
        $dataArry = array(
          'userCode' =>  $json_decode['userCode'],
          'custName' =>  $json_decode['custName'],
          'custId' =>  $json_decode['custId'],
          'state' =>  $json_decode['state'],
          'ysUserCode' =>  $json_decode['ysUserCode'],
          'note' =>  $json_decode['note'],
        );

        var_dump($dataArry);

    }
}
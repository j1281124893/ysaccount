<?php

// This file is auto-generated, don't edit it. Thanks.
namespace Yspay\Yzt\SDK\Payment\Common\Models;



class Response  {

    public function toMap() {
        $res = [];
        if (null !== $this->code) {
            $res['code'] = $this->code;
        }
        if (null !== $this->msg) {
            $res['msg'] = $this->msg;
        }
        if (null !== $this->data) {
            $res['data'] = $this->data;
        }
        if (null !== $this->timeStamp) {
            $res['timeStamp'] = $this->timeStamp;
        }
        if (null !== $this->norce) {
            $res['norce'] = $this->norce;
        }


        return $res;
    }
    /**
     * @param array $map
     * @return
     */
    public static function fromMap($map = []) {
        $model = new self();
        if(isset($map['code'])){
            $model->code = $map['code'];
        }
        if(isset($map['msg'])){
            $model->msg = $map['msg'];
        }
        if(isset($map['data'])){
            $model->data = $map['data'];
        }
        if(isset($map['timeStamp'])){
            $model->timeStamp = $map['timeStamp'];
        }
        if(isset($map['norce'])){
            $model->norce = $map['norce'];
        }

        return $model;
    }
    /**
     * @description 响应原始字符串
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $msg;

    /**
     * @var string
     */
    public $data;

    /**
     * @var boolean
     */
    public $checkFlag;

    public $timeStamp;

    public $norce;

}

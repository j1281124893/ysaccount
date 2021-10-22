<?php


namespace Yspay\Yzt\SDK\Kernel\Util;


class ResponseChecker
{
    public function success($response)
    {
        if (!empty($response->code) && $response->code == '200') {
            return true;
        }

        return false;
    }
}
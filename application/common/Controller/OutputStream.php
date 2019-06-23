<?php
namespace app\common\controller;

class OutputStream
{
    public static function OutJson($code=0, $msg='ok', $data)
    {
        header('content-type:application/json');

        if (empty($data) | $data="" | $data=null)
        {
            $code += 1;
            $msg = 'null';
        }

        $arr['code'] = $code;
        $arr['nsg']  = $msg;
        $arr['data'] = $data;

        echo json_encode($arr);
    }
}

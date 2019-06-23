<?php
namespace app\common\controller;

class InputStream
{
    //curl get方式
    public static function http_get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//使用PHP curl获取页面内容或提交数据，有时候希望返回的内容作为变量储存，而不是直接输出。这个时候就必需设置curl的CURLOPT_RETURNTRANSFER选项为1或true。
        curl_setopt($ch, CURLOPT_HEADER, 0);//启用时会将头文件的信息作为数据流输出。如果你想把一个头包含在输出中，设置这个选项为一个非零值。
        if(stripos($url,'https')){//查找字符串在另一字符串中最后一次出现的位置（不区分大小写）strpos() - 查找字符串在另一字符串中第一次出现的位置（区分大小写）strrpos() - 查找字符串在另一字符串中最后一次出现的位置（区分大小写）
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// https请求 不验证证书和hosts//当请求https的数据时，会要求证书，这时候，加上这两个参数，规避ssl的证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);// https请求 不验证证书和hosts//当请求https的数据时，会要求证书，这时候，加上这两个参数，规避ssl的证书检查
        }
        $output = curl_exec($ch);
        if($output){
            curl_close($ch);
            return $output;
        }else{
            $error = curl_error($ch);
            curl_close($ch);
            return $error;
        }
    }


    //curl post方式
    public static function http_post($url,$post_data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//这是你想用PHP取回的URL地址。你也可以在用curl_init()函数初始化时设置这个选项。
        curl_setopt($ch, CURLOPT_POST, 1);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//使用PHP curl获取页面内容或提交数据，有时候希望返回的内容作为变量储存，而不是直接输出。这个时候就必需设置curl的CURLOPT_RETURNTRANSFER选项为1或true。
        curl_setopt($ch, CURLOPT_HEADER, 0);//启用时会将头文件的信息作为数据流输出。如果你想把一个头包含在输出中，设置这个选项为一个非零值。
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));//CURLOPT_POSTFIELDS:传递一个作为HTTP “POST”操作的所有数据的字符串。  http_build_query:生成 url-encoded 之后的请求字符串描述
        if(stripos($url,'https')){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// https请求 不验证证书和hosts//当请求https的数据时，会要求证书，这时候，加上这两个参数，规避ssl的证书检查
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);// https请求 不验证证书和hosts//当请求https的数据时，会要求证书，这时候，加上这两个参数，规避ssl的证书检查
        }
        $output = curl_exec($ch);
        if($output){
            curl_close($ch);
            return $output;
        }else{
            $error = curl_error($ch);//返回一个保护当前会话最近一次错误的字符串
            curl_close($ch);//关闭一个cURL会话
            return $error;
        }
    }



}
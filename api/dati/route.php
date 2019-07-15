<?php

use think\facade\Route;

//Route::resource('dati/articles', 'dati/Articles');

Route::get('/',function(){
    header("Access-Control-Allow-Origin:*");
    //header('content-type:application/json');
    $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        // 指定json数据输出
        return json(['code'=>1,'message'=>'操作完成','data'=>$data]);
});

Route::get('/code','dati/index/getcode');
//Route::rule('/userinfo','dati/index/saveuserinfo');
Route::post('userinfo','dati/index/saveuserinfo'); // 定义POST请求路由规则
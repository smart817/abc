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

Route::rule('code','dati/index/getcode');
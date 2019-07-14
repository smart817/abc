<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: pl125 <xskjs888@163.com>
// +----------------------------------------------------------------------

namespace api\dati\controller;

use EasyWeChat\Factory;
use cmf\controller\RestBaseController;



class IndexController extends RestBaseController
{
    public function getcode()
    {
        $code = $request->param('code');
        $config = [
            'app_id' => 'wx5aa61c6d9c263087',
            'secret' => 'd6be2230bdfb3d08a45077ef99114491',

            // 下面为可选项
            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];

        $miniProgram = Factory::miniProgram($config);
        $data = $miniProgram->auth->session($code);
        if (isset($data['errcode'])) {
            $this->error('code失效或者不正确');
        }else{
            //array(['openid' => $data['openid'], 'session_key' => $data['session_key']]);
           $this->success('请求成功!', $data);
        }
       
    }
}

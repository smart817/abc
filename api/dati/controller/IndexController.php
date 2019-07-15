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
use think\Db;
use think\facade\Validate;



class IndexController extends RestBaseController
{
    public function getcode()
    {
        $code =  $this->request->param('code');
        $nickName =  $this->request->param('nickName');
        $avatarUrl =  $this->request->param('avatarUrl');
        //$code =  $this->request->param('code');
       //$this->success('请求成功!', ['code'=> $code]);
        $config = [
            'app_id' => 'wx465f003849f31e0e',
            'secret' => 'd59ee15d02f157f827ea3be2835d26d7',

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
            $user = ['openid'=>$data['openid'],'session_key'=>$data['session_key'],'nickName'=>$nickName ,'avatarUrl'=>avatarUrl ];
            $userid = db('api_user')->insert($user);
           $this->success('请求成功!', ['userid'=> $userid]);
        }
       
    }
}

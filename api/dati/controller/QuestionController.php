<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2017 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: pl125 <xskjs888@163.com>
// +----------------------------------------------------------------------

namespace api\dati\controller;

use cmf\controller\RestBaseController;
use think\Db;
use think\facade\Validate;



class QuestionController extends RestBaseController
{
    public function getquestion()
    {
        $data =  $this->request->param();
        // 查询状态为1的用户数据 并且每页显示10条数据
        $questions = Db::name('api_question')->where('user_status',1)->paginate(1);
        // 把分页数据赋值给模板变量users
        //$this->assign('users', $users);
        //$this->assign('page', $users->render());//单独提取分页出来
        // 渲染模板输出
        return $this->fetch();
        $this->success('题库', ['questions'=> $questions,'page'=>$questions->render() ]);
    }

}

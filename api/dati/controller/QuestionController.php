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
        $questions = Db::name('api_question')->where('fenlei',1)->paginate(1);
        $this->success('题库', ['questions'=> $questions ]);
    }
    public function errorquestion()
    {
        //user_id questionid_id
        $data =  $this->request->param();
        $finddata = Db::name('api_errorquestion')->where('user_id',$data['user_id'])->where('question_id',$data['question_id'])->find();
        if(empty($finddata))
        {
            $questions = Db::name('api_errorquestion')->insert($data);
            $this->success('错题记录', ['error_id'=> $questions ]);
        }else{
            $this->success('你又一次答错了', ['error_id'=> $finddata['id'] ]);
        }
    }
    public function shoucang()
    {
        //user_id questionid_id
        $data =  $this->request->param();
        $finddata = Db::name('api_shoucang')->where('user_id',$data['user_id'])->where('question_id',$data['question_id'])->find();
        if(empty($finddata))
        {
            $shoucangid = Db::name('api_shoucang')->insert($data);
            $this->success('收藏成功');
        }else{
            $this->success('你已经收藏了');
        }
    }
    public function changshi()
    {

        $data = Db::name('api_changshi')->all();
        $this->success('你已经收藏了',$data);
    }
}

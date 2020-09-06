<?php

/**
 * @Author: owlcity
 * @Date:   2020-09-01 17:21:52
 * @Last Modified by:   owlcity
 * @Last Modified time: 2020-09-01 19:10:19
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\Staff as StaffModel;
use think\facade\Request;
class Staff extends Controller {
    public function demo1() {
        // 通过模型获取表中数据
        $staffs = StaffModel::all(function($query) {
            $query->field(['staff_id','name','sex','age','salary']);
        })->where('id','>',200);
        $this->assign('staffs', $staffs);
        // $res = StaffModel::find();
        // dump($res);
        // dump($res);
        return $this->fetch();
    }

    // 分页
    public function demo2() {
        $config = [
            'type' => 'bootstrap',
            'var_page' => 'page'
        ];
        $num = 5;
        $simple = false;
        $paginate = StaffModel::paginate($num, $simple, $config);
        // halt($paginate);
        $page = $paginate->render();
        // halt($page);
        $this->assign('staffs', $paginate);
        $this->assign('page', $page);
        return $this->fetch();
    }
    // 文件上传
    public function demo3() {
        return $this->fetch();
    }
    public function demo4() {
        // 1 获取文件信息
        $file = Request::file('file');
        if(is_null($file)) {
            $this->error('没哟选择任何文件');
        }
        // dump($file);
        // 2 移动文件到指定目录
        // 3 上传验证
        $res = $file->validate(['ext' => 'jpg,jpeg,png'])->move('uploads');
        if(false == $res) {
            $this->error($file->getError());
        } 

        $this->success('上传成功');
        // return $this->fetch();
        // return '上传成功';
    }
}
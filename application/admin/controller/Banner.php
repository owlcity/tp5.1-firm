<?php

namespace app\admin\controller;

use app\admin\common\Base;

use think\Request;

use app\admin\model\Banner as BannerModel;
class Banner extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //1.获取到所有的数据记录
        $banner = BannerModel::all();
        $count = BannerModel::count();

        //2.模板赋值
        $this->view->assign('banner', $banner);
        $this->view->assign('count', $count);



        //3渲染模板
        return $this -> view -> fetch('banner_list');
    }

    /**
     * 显示创建资源表单页
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return $this->view->fetch('banner_add');

    }

    /**
     * 保存新建的资源
     * @return \think\Response
     */
    public function save()
    {
        //判断一下提交类型
        if ($this->request->isPost()) {

            //1.获取一下提交的数据,包括上传文件
            $data = $this->request->param(true);

            //2获取一下上传的文件对象
            $file = $this->request->file('image');

            //3判断是否获取到了文件
            if (empty($file)) {
                $this->error($file->getError());
            }

            //4上传文件
            $map = [
                'ext'=>'jpg,png',
                'size'=> 3000000
            ];
            $info = $file->validate($map)->move('uploads/');
            if (is_null($info)){
                $this->error($file->getError());
            }

            //5向表中新增数据
            $data['image'] = $info -> getSaveName();

            $res = BannerModel::create($data);

            //6判断新增是否成功
            if (is_null($res)){
                $this->error('新增失败');
            }

            $this->success('新增成功~~');

        }else {
            $this -> error('请求类型错误~~');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //1.查询要编辑的记录
        $data = BannerModel::get($id);

        //2.将查询结果赋值给模板
        $this -> view -> assign('data', $data);

        //3.渲染模板
        return $this->view->fetch('banner_edit');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update()
    {
        //1.获取所有提交过来的数据，包括文件
       $data = $this ->request -> param(true);

        //2.对于文件单独操作打包成一个文件对象
        $file = $this -> request -> file('image');

        //3.文件验证与上传
        $info = $file -> validate(['ext'=>'jpg,png','size'=>3000000])->move('uploads/');
        if (is_null($info)){
            $this->error($file->getError());
        }

        //4.执行更新操作
        $res = BannerModel::update([
            'image'=> $info -> getSaveName(),
            'link' => $data['link'],
            'description' => $data['description']
        ],['id'=> $data['id']]);

        //5.检测更新
        if (is_null($res)) {
            $this -> error('更新失败~~');
        }

        //6.更新成功
        $this->success('更新成功~~');



    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        BannerModel::destroy($id);

    }
}

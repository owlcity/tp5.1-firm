<?php
namespace app\index\controller;
// use think\facade\View;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return '网站开启状态';
    }

    public function demo1($name = 'ThinkPHP5--assign默认')
    {
        // return 'hello,' . $name;
        // return View::display($name);
        // 1 fetch模板表达式制定一个模板进行内容输出
        // 模板表达式：模板@控制器/操作方法
        // 模板以模块/view目录为根目录
        // return View::fetch('index@index/demo1', ['name' => $name]);
        // 用控制器中的view调用
        // return $this->view->fetch('index@index/demo1', ['name' => $name]);
        // 越过view属性调用fetch
        // return $this->fetch('index@index/demo1', ['name' => $name]);
        // 默认规则定位模板
        // 模板赋值
        $this->assign('name', $name);
        // return $this->fetch('demo1', ['name' => $name]);
        return $this->fetch('demo1');

    }

    public function demo2() {
        $name = 'demo2';
        $this->assign('name', $name);
        return $this->fetch();
    }
    // 模板替换
    public function demo3(){
        $name = 'zhang';
        $age = '12';
        $this->assign('name', $name);
        $this->assign('age', $age);
        $filter = function($content) {
            return str_replace('zhang','张',$content);
        };
        return $this->filter($filter)->fetch();
    }
    // 模板布局
    public function demo4() {
        return $this->view      // 调用视图
                ->engine        // 模板引擎对象
                ->layout(true)  // 开启模板布局
                ->fetch('index\demo4'); // 渲染模板
    }
    // 模板继承
    public function demo5 () {
        return $this->fetch();
    }
}

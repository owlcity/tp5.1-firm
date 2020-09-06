<?php
namespace app\admin\controller;

use app\admin\common\Base;

class Index extends Base
{
    public function index()
    {
        // return 'admin';
        $this -> isLogin();
        return $this->fetch();
    }

    public function welcome() {
        // return 'welcome';
        return $this->fetch();
    }
}

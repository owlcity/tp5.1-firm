<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    // 创建获取器方法，实现时间转换
    public function getLastTimeAttr($val) {
        return date('Y/m/d', $val);
        // return date(format: 'Y/m/d', timestamp: $val);
    }
    //创建修改器,将密码自动md5加密存储
    public function setPasswordAttr($val)
    {
        return md5($val);
    }
}

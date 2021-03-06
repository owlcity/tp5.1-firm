<?php

/**
 * @Author: owlcity
 * @Date:   2020-09-04 13:35:29
 * @Last Modified by:   owlcity
 * @Last Modified time: 2020-09-04 15:29:00
 */
namespace app\index\controller;
use think\Controller;
use think\facade\Validate;
use app\index\model\User;

class Regist extends Controller {
    public function index() {
        return $this->fetch();
        // return 'regist';
    }
    // 注册
    public function regist(){
        $user = new User;
          //接收前端表单提交的数据
          //接收前端表单提交的数据
          $user->user_name = input('post.UserName');
          $user->user_sex = input('post.UserSex');
          $user->user_tel = input('post.UserTel');
          $user->user_email = input('post.UserEmail');
          $user->user_address = input('post.UserAddress');
          $user->user_birth = input('post.UserBirth');
          $user->user_passwd = input('post.UserPasswd');
          $user->user_signature = input('post.UserSignature');
          $user->user_hobby = input('post.UserHobby');
          $result = $this->validate(
            [
              'name' => $user->user_name,
              'email' => $user->user_email,
              'sex' => $user->user_sex,
              'tel' => $user->user_tel,
              'address' => $user->user_address,
              'birth' => $user->user_birth,
              'password' => $user->user_passwd,
            ],
            [
              'name' => 'require|max:10',
              'email' => 'email',
              'sex' => 'number|between:0,1',
              'tel' => 'require',
              'address' => 'require',
              'birth' => 'require',
              'password' => 'require',
            ]);
          dump($user);
          dump($result);
          if(true !== $result) {
            $this->error($result);
          }
          // 写入数据库
          if($user->save()) {
            return $this->success('注册成功');
          } else {
            return $this->success('注册失败');
          }

        // return 'regist';
    }
}
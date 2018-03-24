<?php
namespace app\admin\controller;
use app\common\controller\Back;
use think\Config;
class Index extends Back
{
    protected $model;
    // protected $lang;

    public function __construct(){
        parent::__construct();

        // 实例化模型
        $this->model = model('index');
    }
    //  后台首页
    public function index(){
        return $this->fetch();
    }


    // 登录
    public function login(){
        echo $this->model->check();

        // dump($this->request->module());
        // dump($this->request->controller());
        // dump($this->request->action());
        if(isset($_POST) && !empty($_POST)){
            var_dump($_POST);exit;
            $_POST = htmlspecialchars($_POST);
            foreach ($_POST as $key => $value) {
                if(empty($value)){
                    $this->error($this->lang[$key]);
                }
                $$key = safe_replace($value);
            }
            
            
            $this->redirect("admin");
        }
        return $this->fetch('index/login');
    }

    // 登出
    public function logout(){
        session('userid',null);
        session('username',null);
        $this->register("admin");
    }
}

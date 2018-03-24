<?php
namespace app\common\controller;
use think\Controller;
use think\Request;
use think\Session;
use think\Config;
class Back extends Controller
{
    protected $py ; // 拼音扩展
    protected $login ; // 登录
    protected $request; 

    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        session_start();
        $this->py = new \novel\ChinesePinyin(); // 拼音扩展类
        $this->request = Request::instance();
        $this->check_login();
        $this->lang = Config::load(APP_PATH.'error_zh.php','error_zh');
    }



    public function index()
    {
        // var_dump($this);
    }
    final public function check_login(){
        if($this->request->module()=='admin' && $this->request->controller()=='Index' && $this->request->action()=='login'){
            return true;
        }else{
            if( !session('?userid') || !session('?username')){
                $lang = Config::load(APP_PATH.'error_zh.php','error_zh');
                $this->error($lang['login'],"admin/index/login");
            }else{
                return true;
            }
        }
        
    }
}

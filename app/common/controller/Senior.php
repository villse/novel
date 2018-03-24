<?php
namespace app\common\controller;
use think\Controller;
class Senior extends Controller
{
    protected $py ;
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->py = new \novel\ChinesePinyin(); // 拼音扩展类
    }



    public function index()
    {
        // var_dump($this);
    }
}

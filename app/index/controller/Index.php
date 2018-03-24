<?php
namespace app\index\controller;

use app\common\controller\Senior;

class Index extends Senior{
    public function index()
    {
        
        return  $this->view->fetch();
    }

}

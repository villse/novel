<?php
namespace app\book\controller;

class Index
{
    public function index($a = 0){
        echo $a;
        return __FILE__;
    }


}

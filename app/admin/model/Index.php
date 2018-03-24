<?php

namespace app\admin\model;

use think\Model;
use think\Session;

class Index extends Model
{

    public function check(){
        return 'hello';
    }

    /**
     * 重置用户密码
     *
     */
    public function resetPassword($uid, $NewPassword)
    {
        $passwd = $this->encryptPassword($NewPassword);
        $ret = $this->where(['id' => $uid])->update(['password' => $passwd]);
        return $ret;
    }

    // 密码加密
    protected function encryptPassword($password, $salt = '', $encrypt = 'md5')
    {
        return $encrypt($encrypt($password . $salt));
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class AppUser extends Model
{
    //
    use HasApiTokens,Notifiable;
    protected $table = 'app_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_name',
        'user_pwd'
    ];
    public function findForPassport($username)
    {
        return $this
            ->Where('user_name', $username)
            ->first();
    }
    public function validateForPassportPasswordGrant($password)
    {
        //如果请求密码等于数据库密码 返回true（此为实例，根据自己需求更改）
        if($password == $this->user_pwd){
            return true;
        }
        return false;
    }


}

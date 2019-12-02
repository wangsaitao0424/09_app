<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'user_role';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'user_role_id';
    /**
     * 指示是否自动维护时间戳
     *
     * @var bool
     */
    public 	  $timestamps = false;
    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['user_id','role_id'];
}

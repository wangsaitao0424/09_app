<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role_Right extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'role_right';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'role_right_id';
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
    protected $fillable = ['role_id','right_id'];
}

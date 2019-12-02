<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'role';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'role_id';
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
    protected $fillable = ['role_name','role_time'];
}

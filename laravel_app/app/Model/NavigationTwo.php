<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NavigationTwo extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'navigation_two';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'nt_id';
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
    protected $fillable = ['nt_name','nt_weight','is_show','na_id','nt_time'];
}

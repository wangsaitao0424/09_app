<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NavigationThree extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'navigation_three';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'nth_id';
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
    protected $fillable = ['nth_name','nth_url','nth_img','nth_weight','is_show','nth_content','nt_id','nth_time'];
}

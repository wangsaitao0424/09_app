<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'navigation';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'na_id';
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
    protected $fillable = ['na_name','na_url','na_weight','na_time','na_home'];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'slides';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'sl_id';
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
    protected $fillable = ['sl_img','sl_weight','is_show','sl_time'];
}

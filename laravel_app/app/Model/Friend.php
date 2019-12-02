<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'friend';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'f_id';
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
    protected $fillable = ['f_name','f_url','f_weight','is_show','f_time'];
}

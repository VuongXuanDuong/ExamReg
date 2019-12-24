<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ModuleUser;

class Module extends Model
{
    //
    protected $fillable = ['name', 'code'];

    public function module_user()
    {
        return $this->hasMany(ModuleUser::class, 'module_id', 'id');
    }

    public function exam_shift()
    {
        return $this->hasMany(ExamShift::class, 'module_id', 'id');
    }
}

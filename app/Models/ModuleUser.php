<?php

namespace App\Models;

use App\StudentAccount;
use Illuminate\Database\Eloquent\Model;

class ModuleUser extends Model
{
    //
    protected $fillable = ['module_id', 'user_id', 'status', 'exam_id'];
    public function module() {
        return $this->belongsTo(Module::class,'module_id','id');
    }
    public function user() {
        return $this->belongsTo(StudentAccount::class,'user_id','id');
    }
}

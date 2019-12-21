<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModuleUser;

class StudentAccount extends Authenticatable
{
    protected $guard = "students";
    protected $table = 'student_accounts';
    protected $fillable =["username","full_name","vnu_mail","school_year"];
    public function module_user() {
        return $this->hasMany(ModuleUser::class,'user_id','id');
    }
}

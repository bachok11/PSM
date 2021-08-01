<?php

namespace App;
use App\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Hafiz extends Model
{
    protected $table = 'users';

    public static $default_reference = 'tbl_hafiz';
    public static $pass_test = 0;

    protected $fillable = [
        'name', 'lastname', 'no_ic', 'email',
        'mobile_no', 'gender','address', 
        'daerahID', 'mukimID',
        'account_no','no_juzuk',
    ];

    public function scopeGetByUser($query, $id) 
    {
        $role = getUsersRole(Auth::User()->role_id);
        if (isAdmin(Auth::User()->role_id)) 
        {
            return $query;
        } 
        else 
        {
            return $query->where('id', Auth::User()->id);
        }
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_reference', 'id');
    }
}
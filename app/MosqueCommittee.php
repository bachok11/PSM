<?php

namespace App;

use App\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class MosqueCommittee extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'lastname', 'no_ic', 'email',
        'mobile_no', 'gender','address', 
        'daerahID', 'mukimID', 'roleID', 
        'account_no','appointment_letter',
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
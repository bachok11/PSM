<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MosqueCommittee extends Model
{
    protected $table = 'tbl_mosque_committee';

    protected $fillable = [
        // 'mosqueID', 'mukimID', 'daerahID', 'roleID', 'firstname', 'lastname', 'no_ic', 'email',
        // 'email_verified_at', 'mobile_no', 'gender', 'mobile_no','address', 'cityID', 'password',
        // 'appointment_letter', 
        'firstname', 'lastname', 'no_ic', 'email',
        'mobile_no', 'gender','address', 
        'daerahID', 'mukimID', 'roleID', 'mosque_name',
        'account_no','appointment_letter', 
    ];
}
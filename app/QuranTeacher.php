<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuranTeacher extends Model
{
    protected $table = 'tbl_quran_teachers';
    protected $primaryKey = "teacherID"; //default it look for id

    protected $fillable = [
        // 'mosqueID', 'mukimID', 'daerahID', 'roleID', 'firstname', 'lastname', 'no_ic', 'email',
        // 'email_verified_at', 'mobile_no', 'gender', 'mobile_no','address', 'cityID', 'password',
        // 'appointment_letter', 
        'firstname', 'lastname', 'school_name', 'no_ic', 'email',
        'mobile_no', 'gender','address', 
        'daerahID', 'mukimID',
        'account_no','appointment_letter', 'image'
    ];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuranTeacher extends Model
{
    protected $table = 'tbl_quran_teachers';
    protected $primaryKey = "teacherID"; //default it look for id

    protected $fillable = [
        'firstname', 'lastname', 'school_name', 'no_ic', 'email',
        'mobile_no', 'gender','address', 
        'daerahID', 'mukimID',
        'account_no','appointment_letter',
    ];
}
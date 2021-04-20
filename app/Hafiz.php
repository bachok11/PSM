<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hafiz extends Model
{
    protected $table = 'tbl_hafiz';
    protected $primaryKey = "hafizID"; //default it look for id

    protected $fillable = [
        'firstname', 'lastname', 'no_ic', 'email',
        'mobile_no', 'gender','address', 
        'daerahID', 'mukimID',
        'account_no','no_juzuk',
    ];
}
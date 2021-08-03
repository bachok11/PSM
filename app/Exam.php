<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    public $table = 'tbl_exam';

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    // protected $fillable = [
    //     'name',
    //     'price',
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    // public function employees()
    // {
    //     return $this->belongsToMany(Employee::class);
    // }

    // public function appointments()
    // {
    //     return $this->belongsToMany(Appointment::class);
    // }
}

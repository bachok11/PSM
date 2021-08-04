<?php

namespace App;

use App\MosqueCommittee;
use App\QuranTeacher;
use App\Hafiz;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    public $table = 'tbl_appointments';
    public static $string_reference = 'users';
    public static $default_pass_test = 0;

    use SoftDeletes;

    protected $fillable = [
        'id_reference',
        'reference',
        'id_tester',
        'start_time',
        'test_type',
        'pass_test',
    ];

    public function mosque_committee()
    {
        return $this->belongsTo(MosqueCommittee::class, 'id');
    }

    public function quran_teachers()
    {
        return $this->belongsTo(QuranTeacher::class, 'id');
    }

    public function hafiz()
    {
        return $this->belongsTo(hafiz::class, 'id');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

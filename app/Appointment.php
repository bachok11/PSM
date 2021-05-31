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
    use SoftDeletes;

    public $table = 'tbl_appointments';

    protected $dates = [
        'start_time',
        'created_at',
        'updated_at',
        'deleted_at',
        'finish_time',
    ];

    protected $fillable = [
        'price',
        'comments',
        'client_id',
        'start_time',
        'created_at',
        'updated_at',
        'deleted_at',
        'employee_id',
        'finish_time',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = "report";
    public $timestamps = false;
    protected $fillable = [
        'id_report',
        'users_id',
        'tanggal_report',
        'keluhan'
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}

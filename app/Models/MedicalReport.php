<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalReport extends Model
{
    use HasFactory;

    protected $table = 'medical_reports';
    protected $primaryKey = 'medical_report_id';
    protected $fillable = [
        'date',
        'status',
        'diagnosis',
        'medical_record',
    ];
}

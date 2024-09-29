<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDrug extends Model
{
    use HasFactory;
    protected $table = 'prescription_drugs';
    protected $primaryKey = 'prescription_drugs_id';

    protected $fillable = [
        'prescription_id',
        'drug_id',
    ];
}

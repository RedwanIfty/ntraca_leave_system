<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    public $table = 'designations';
    public $primaryKey="designation_id";

    public $timestamps = false;

    protected $fillable = [
        'designation_name'
    ];
}

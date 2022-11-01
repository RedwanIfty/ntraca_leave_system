<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public $table = 'branch';
    public $primaryKey = 'branch_id';
    public $timestamps = false;

    protected $fillable = ['branch_name'];
}

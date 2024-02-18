<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoterInfoCorrection extends Model
{
    use HasFactory;

    protected $fillable = ['application_id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingUserInfo extends Model
{
    use HasFactory;
    public const TYPE_ADMIN = 'admin';
    public const TYPE_USER = 'user';
}

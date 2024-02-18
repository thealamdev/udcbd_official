<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawProve extends Model
{
    use HasFactory;

    /**
     * @var protected $guarded
     * protected guarded perperties
     */
    protected $guarded = ['id'];
}

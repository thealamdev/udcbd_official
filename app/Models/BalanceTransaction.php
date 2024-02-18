<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceTransaction extends Model
{
    use HasFactory;

    /**
     * protected guarded properties.
     */
    protected $guarded = ['id'];

    /**
     * method for relation with users 
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    /**
     * @var protected $guarded
     * protected guarded perperties
     */
    protected $guarded = ['id'];

    /**
     * method for relation with Transacion model
     */
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * method for relation with User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * method for relation with WithdrawRequest
     */
    public function withdrawRequest()
    {
        return $this->hasOne(WithdrawRequest::class, 'withdraw_id');
    }

    /**
     * method for relation with withdrawProve model
     */
    public function withdrawProve()
    {
        return $this->hasOne(WithdrawProve::class, 'withdraw_id');
    }
}

<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentsClient extends Model
{
    use HasFactory;

    /**
     * protected guarded properties
     */

    protected $guarded = ['id'];

    /**
     * method for relation with User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Balance extends Model
{
    use HasFactory;

    /**
     * protected fillable properties.
     */
    protected $fillable = ['user_id', 'balance'];

    /**
     * relation with debit model
     */
    public function debit(): HasMany
    {
        return $this->hasMany(Debit::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panic extends Model
{
    use HasFactory;
    
    protected $fillable = ['longitude', 'latitude', 'panic_type', 'details'];

    /**
     * Get the user that owns the panic.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPasswordResetToken extends Model
{
    protected $guarded = ['id'];
    const UPDATED_AT = null;
    
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

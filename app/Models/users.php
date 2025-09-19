<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $fillable = [
        'Personal_ID',
        'name',
        'email',
        'password',
    ];

    // ek user ke multiple graduation records ho sakte hain
    public function graduates()
    {
        return $this->hasMany(Graduates::class, 'StudentID', 'Personal_ID');
    }
}

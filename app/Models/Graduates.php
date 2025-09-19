<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduates extends Model
{
    use HasFactory;

    protected $fillable = [
        'StudentID',
        'name',
        'father_name',
        'course',
        'graduation_date',
        'grade',
    ];

    // har graduation ek hi user se belong karti hai
    public function user()
    {
        return $this->belongsTo(users::class, 'StudentID', 'Personal_ID');
    }
}

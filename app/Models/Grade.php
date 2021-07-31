<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function standart()
    {
        return $this->belongsTo(Standart::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function GradeStorings()
    {
        return $this->hasMany(GradeStoring::class);
    }
}

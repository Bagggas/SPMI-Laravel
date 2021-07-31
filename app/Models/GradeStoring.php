<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeStoring extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function Standart()
    {
        return $this->belongsTo(Standart::class);
    }

    public function User()
    {
        return $this->belongsTo(Grade::class);
    }

    public function UserViewAuditor()
    {
        return $this->hasOne(User::class,'id','auditor_id');
    }
}

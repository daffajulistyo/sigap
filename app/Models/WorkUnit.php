<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class, 'work_unit_id');
    }
}

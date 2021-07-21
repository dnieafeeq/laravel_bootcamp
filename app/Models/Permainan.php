<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permainan extends Model
{
    use HasFactory;

    public function kedai()
    {
        return $this->belongsTo(Kedai::class);
    }
}

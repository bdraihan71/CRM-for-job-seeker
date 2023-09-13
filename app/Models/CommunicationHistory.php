<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommunicationHistory extends Model
{
    use HasFactory, SoftDeletes;

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'details', 'user_id'
    ];

    public function incrementViews()
    {
        $this->views++;
        $this->save();
    }
}

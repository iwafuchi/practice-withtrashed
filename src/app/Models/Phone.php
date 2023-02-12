<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model {
    use HasFactory, SoftDeletes;

    protected $appends = [
        'random_id'
    ];


    public function user() {
        return $this->belongsTo(User::class, 'random_id');
    }

    public function getRandomIdAttribute() {
        return rand(0, 99999);
    }
}

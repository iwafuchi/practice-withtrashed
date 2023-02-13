<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model {
    use HasFactory, SoftDeletes;

    protected $appends = [
        'status_of_use'
    ];


    protected $fillable = [
        'name',
        'updated_at',
        'deleted_at',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getStatusOfUseAttribute() {
        return isset($this->deleted_at) ? $this->naem . ' is unusable' : $this->name . ' is usable';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ketinggian extends Model
{
    use HasFactory;
    protected $table = 'data_ketinggian';
    protected $fillable = [
        'id_sensor',
        'kapasitas'
    ];
    protected $hidden = [];
    // public function node()
    // {
    //     return $this->belongsTo(Node::class, 'id_sensor', 'id');
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table='event';
    public $timestamps=true;

    protected $fillable=['place','data', 'hour','show_id'];

    public function show(){
        return $this->belongsTo(Show::class,'show_id','id');
    }
}

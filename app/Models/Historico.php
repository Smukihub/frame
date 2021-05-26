<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Historico extends Model
{
    public $timestamps = false;
    protected $fillable = ['fecha','dia','hora','tipo','actv','horares','justi','seguimiento_id'];
    
    public function proyecto(){
        return $this->hasOne('App\Models\Proyecto','id','seguimiento_id');
    }
}

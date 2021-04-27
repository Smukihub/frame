<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;



class Usuario extends Authenticatable
{
	use Notifiable;
	
    public $timestamps = false;
    protected $fillable = ['email','n_control','nombre','rol','password'];
}

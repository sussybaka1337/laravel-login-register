<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class Account extends Authenticable
{
    use HasFactory;
    protected $primaryKey = 'account_id';
    protected $table = 'accounts';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'email',
        'password'
    ];
}

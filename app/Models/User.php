<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function listAllUsers() {

        $users = DB::table('users as us')
        ->join('positions as pos','us.fk_position', '=', 'pos.id')
        ->join('instituitions as inst', 'us.fk_instituition', '=', 'inst.id')
        ->join('departments as dept', 'us.fk_department', '=',  'dept.id')
        ->select('us.name as us_name', 'us.id as us_id', 'pos.name as pos_name', 
        'inst.fantasy_name as fan_name', 'dept.name as dept_name')
        ->get();

        return $users;

    }



}

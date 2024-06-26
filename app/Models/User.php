<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];
}

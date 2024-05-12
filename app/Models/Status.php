<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public static function getStatuses(): array
    {
        $statuses = self::pluck('id')->toArray();

        $statuses[] = 0;

        return $statuses;
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

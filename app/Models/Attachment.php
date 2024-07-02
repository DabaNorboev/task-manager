<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    protected $fillable = ['name','attachment_path','uploaded_by', 'task_id'];
}

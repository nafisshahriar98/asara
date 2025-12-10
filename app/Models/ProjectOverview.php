<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectOverview extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'title', 'detail'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

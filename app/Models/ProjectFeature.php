<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectFeature extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'feature_text'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

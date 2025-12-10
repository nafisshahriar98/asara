<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    // ✅ Allow mass-assignment for every field you set in controller
    protected $fillable = [
        'title',
        'slug',
        'banner_title',
        'banner_subtitle',
        'description',
        'status',
        'project_stage',
        'banner_image',
        'overview_image',
    ];

    // ✅ Relations used in controller
    public function features()
    {
        return $this->hasMany(ProjectFeature::class);
    }

    public function overviews()
    {
        return $this->hasMany(ProjectOverview::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }
    //overview image relation
    public function overview_image()
    {
        return $this->hasOne(ProjectOverview::class); 
    }          

}

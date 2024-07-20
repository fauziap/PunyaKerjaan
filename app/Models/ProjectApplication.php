<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectApplication extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'project_applications';
    protected $guarded = [];
    protected $with = ['freelancer', 'project'];

    public function freelancer(){
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}

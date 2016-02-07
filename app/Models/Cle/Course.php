<?php

namespace App\Models\Cle;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'

    ];

    /**
     *All exams for a course
     */
    public function sprints()
    {
        return $this->hasMany(Sprint::class);
    }

    /**
     * Get all exams for this course through sprints
     */
    public function exams()
    {
        return $this->hasManyThrough('App\Models\Cle\Exam', 'App\Models\Cle\Sprint');
    }
}

<?php

namespace App\Models\Cle;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
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
     *All exams for a sprint
     */
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    /**
     * The course related to the exam
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

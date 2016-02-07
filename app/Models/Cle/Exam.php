<?php

namespace App\Models\Cle;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',

    ];

    /**
     *All feedback for a Exam
     */
    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    /**
     * The sprint related to the exam
     */
    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}

<?php

namespace App\Models\Cle;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'result'
    ];


    /**
     * The student related to the result
     */
    public function student()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The exam related to the result
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}

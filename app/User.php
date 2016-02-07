<?php

namespace App;

use App\BB\BuildingBlock;
use App\Models\Cle\Feedback;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'firstname',
        'name_prefix',
        'lastname',
        'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Get all of the feedback for the user.
    */
    public function allFeedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function fullName()
    {
        $fullName  = $this->firstname.' ';
        $fullName .= $this->name_prefix.' ' or '';
        $fullName .= $this->lastname;
        return $fullName;
    }

    public function fullNameSlug()
    {
        return str_slug($this->fullName(), "-");
    }

//    public function buildingBlocks()
//    {
//        $this->belongsToMany(BuildingBlock::class);
//    }
}

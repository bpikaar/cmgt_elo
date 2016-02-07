<?php

namespace App\Models\BB;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BuildingBlock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slogan',
        'description',
        'challenges',
    ];

    public function curators()
    {
        return $this->belongsToMany(User::class);
    }

    public function curatorList()
    {
        return $this->curators()->lists('id');
    }

    public function hasCurator($id)
    {
        return $this->curatorList()->contains($id);
    }
}

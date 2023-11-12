<?php

namespace App\Abstracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * Get the owner of the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the users that belong to the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'team_id');
    }

    /**
     * Get all of the team's users including its owner.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allUsers()
    {
        return $this->users->merge([$this->owner]);
    }
}

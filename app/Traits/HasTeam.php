<?php

namespace App\Traits;

use App\Models\Team\Team;

trait HasTeam{

    /**
     * Get the current company of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ownedTeam()
    {
        return $this->HasOne(Team::class, 'user_id');
    }

}

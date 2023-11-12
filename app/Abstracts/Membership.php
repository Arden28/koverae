<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Membership extends Pivot
{
    /**
     * The table associated with the pivot model.
     *
     * @var string
     */
    protected $table = 'company_users';
}

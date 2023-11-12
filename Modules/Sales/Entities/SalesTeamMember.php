<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class SalesTeamMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function salesTeam() {
        return $this->belongsTo(SalesTeamMember::class, 'sales_team_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Sales\Database\factories\SalesTeamMemberFactory::new();
    // }
}

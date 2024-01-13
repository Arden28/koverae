<?php

namespace Modules\Sales\Entities;

use App\Models\Company\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class SalesTeam extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function leader() {
        return $this->belongsTo(SalesPerson::class, 'team_leader_id', 'id');
    }


    public function salesPerson() {
        return $this->hasMany(SalesPerson::class, 'sales_team_id', 'id');
    }

    public function sales() {
        return $this->hasMany(Sale::class, 'sales_team_id', 'id');
    }

    // protected static function newFactory()
    // {
    //     return \Modules\Sales\Database\factories\SalesTeamFactory::new();
    // }
}

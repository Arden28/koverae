<?php

namespace Modules\Sales\Entities\Program;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sales\Database\factories\SalesProgramFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Pos\Entities\Session\PosSession;
use Modules\Sales\Entities\Program\SalesProgramCondition;
use Modules\Sales\Entities\Sale;
use Modules\Sales\Entities\SalesProgramReward;

class SalesProgram extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }
    public function sales() {
        return $this->hasMany(Sale::class, 'program_id', 'id');
    }

    public function conditions() {
        return $this->hasMany(SalesProgramCondition::class, 'program_id', 'id');
    }

    public function rewards() {
        return $this->hasMany(SalesProgramReward::class, 'program_id', 'id');
    }


    // protected static function newFactory(): SalesProgramFactory
    // {
    //     //return SalesProgramFactory::new();
    // }
}

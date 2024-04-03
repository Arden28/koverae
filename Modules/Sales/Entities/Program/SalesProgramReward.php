<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sales\Database\factories\SalesProgramRewardFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Pos\Entities\Session\PosSession;
use Modules\Sales\Entitie\Program\SalesProgram;

class SalesProgramReward extends Model
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
    public function program() {
        return $this->belongsTo(SalesProgram::class, 'program_id', 'id');
    }

    // protected static function newFactory(): SalesProgramRewardFactory
    // {
    //     //return SalesProgramRewardFactory::new();
    // }
}

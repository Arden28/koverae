<?php

namespace Modules\Sales\Entities\Program;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Sales\Database\factories\SalesProgramConditionFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entitie\Program\SalesProgram;

class SalesProgramCondition extends Model
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

    // protected static function newFactory(): SalesProgramConditionFactory
    // {
    //     //return SalesProgramConditionFactory::new();
    // }
}

<?php

namespace Modules\Pos\Entities\Floor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pos\Database\factories\FloorPlanFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Pos\Entities\Pos\Pos;

class FloorPlan extends Model
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

    public function scopeIsPos(Builder $query, $pos_id)
    {
        return $query->where('pos_id', $pos_id);
    }

    // Get Pos
    public function pos() {
        return $this->belongsTo(Pos::class, 'pos_id', 'id');
    }

    // Get Pos
    public function plans() {
        return $this->hasMany(Table::class, 'floor_plan_id', 'id');
    }


    // protected static function newFactory(): FloorPlanFactory
    // {
    //     //return FloorPlanFactory::new();
    // }
}

<?php

namespace Modules\Pos\Entities\Pos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Pos\Database\factories\PosSettingFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Pos\Entities\Pos\Pos;

class PosSetting extends Model
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

    // protected static function newFactory(): PosSettingFactory
    // {
    //     //return PosSettingFactory::new();
    // }
}

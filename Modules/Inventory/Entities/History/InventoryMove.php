<?php

namespace Modules\Inventory\Entities\History;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Inventory\Database\factories\InventoryMoveFactory;

class InventoryMove extends Model
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

    // protected static function newFactory(): InventoryMoveFactory
    // {
    //     //return InventoryMoveFactory::new();
    // }
}

<?php

namespace Modules\Inventory\Entities\UoM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Inventory\Database\factories\UnitOfMeasureCategoryFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitOfMeasureCategory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    // protected static function newFactory(): UnitOfMeasureCategoryFactory
    // {
    //     //return UnitOfMeasureCategoryFactory::new();
    // }
}

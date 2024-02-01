<?php

namespace Modules\App\Entities\Email;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\App\Database\factories\EmailTemplateFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTemplate extends Model
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

    public function scopeApplyTo(Builder $query, $apply_to)
    {
        return $query->where('apply_to', $apply_to);
    }


    public function model()
    {
        return $this->morphTo('model');
    }

    // protected static function newFactory(): EmailTemplateFactory
    // {
    //     //return EmailTemplateFactory::new();
    // }
}

<?php

namespace Modules\Pos\Entities\Pos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Pos\Database\factories\PosFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Pos\Entities\Session\PosSession;
use Illuminate\Support\Str;

class Pos extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pos) {
            $pos->private_key = Str::uuid();
        });
    }
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function scopeIsOpened(Builder $query)
    {
        return $query->where('status', 'active');
    }


    public function sessions() {
        return $this->hasMany(PosSession::class, 'pos_id', 'id');
    }
    public function activeSession(){
        return $this->hasOne(PosSession::class, 'id', 'active_session_id');
    }
    public function setting() {
        return $this->hasOne(PosSetting::class, 'pos_id', 'id');
    }


    // protected static function newFactory(): PosFactory
    // {
    //     //return PosFactory::new();
    // }
}

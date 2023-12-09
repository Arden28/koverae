<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Modules\Sales\Entities\Sale;
use App\Models\User;
use Modules\Contact\Entities\Contact;

class SalesPerson extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales_people';

    protected $guarded = [];

    // If the sales belong to the company
    public function scopeIsCompany(Builder $query, $company_id)
    {
        return $query->where('company_id', $company_id);
    }

    public function sales() {
        return $this->hasMany(Sale::class, 'seller_id', 'id');
    }

    public function team() {
        return $this->belongsTo(SalesTeam::class, 'sales_team_id', 'id');
    }

    public function user() {
        return $this->belongsTo(Contact::class, 'user_id', 'id');
    }
    // protected static function newFactory()
    // {
    //     return \Modules\Sales\Database\factories\SalesPersonFactory::new();
    // }
}

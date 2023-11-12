<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Company\Company;

class Currency extends Model
{
    use HasFactory;

    protected $guarded = [];


    // Appartient à une company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

}

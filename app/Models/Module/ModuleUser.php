<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module\Module;

class ModuleUser extends Model
{
    use HasFactory;
    protected $table = 'module_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_id',
        'module_slug',
    ];

    public function module(){
        return $this->belongsTo(Module::class, 'module_slug', 'slug');
    }
}

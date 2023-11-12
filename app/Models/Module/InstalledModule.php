<?php

namespace App\Models\Module;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstalledModule extends Model
{
    use HasFactory;

    // protected $table = 'installed_modules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_id',
        'module_slug',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_slug', 'slug');
    }

    // public function team()
    // {
    //     return $this->belongsTo(Team::class, 'team_id', 'id');
    // }
}

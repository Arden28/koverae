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
    protected $guarded = [];

    // public static function boot() {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $module = Module::findBySlug($model->slug);
    //         if($module->parent_slug){
    //             $parent = Module::find($module->parent_slug);
    //             InstalledModule::create([
    //                 'company_id' => current_company()->id,
    //                 'module_slug' => $parent->id
    //             ]);
    //         }
    //     });
    // }


    public function module()
    {
        return $this->belongsTo(Module::class, 'module_slug', 'slug');
    }

    // public function team()
    // {
    //     return $this->belongsTo(Team::class, 'team_id', 'id');
    // }
}

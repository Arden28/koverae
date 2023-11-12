<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Model;
use App\Abstracts\Membership;
use App\Models\CompanyInvitation;
use App\Models\CompanyUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Modules\Pos\Entities\Pos;
use Modules\Pos\Traits\HasPos;

class Company extends Model
{
    use HasFactory, Notifiable;
    // use HasFactory, Notifiable, HasPos;
    /**
     * Get the owner of the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the company's users including its owner.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allUsers()
    {
        return $this->users->merge([$this->owner]);
    }

    /**
     * Get all of the users that belong to the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, Membership::class)
                        ->withPivot('role')
                        ->withTimestamps()
                        ->as('membership');
    }

    /**
     * Determine if the given user belongs to the company.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function hasUser($user)
    {
        return $this->users->contains($user) || $user->ownsCompany($this);
    }

    /**
     * Determine if the given email address belongs to a user on the company.
     *
     * @param  string  $email
     * @return bool
     */
    public function hasUserWithEmail(string $email)
    {
        return $this->allUsers()->contains(function ($user) use ($email) {
            return $user->email === $email;
        });
    }


    /**
     * Get all of the pending user invitations for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companyUsers()
    {
        return $this->hasMany(CompanyUser::class);
    }


    /**
     * Get all of the pending user invitations for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companyInvitations()
    {
        return $this->hasMany(CompanyInvitation::class);
    }
    /**
     * Remove the given user from the company.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function removeUser($user)
    {
        if ($user->current_company_id === $this->id) {
            $user->forceFill([
                'current_company_id' => null,
            ])->save();
        }

        $this->users()->detach($user);
    }

    /**
     * Purge all of the company's resources.
     *
     * @return void
     */
    public function purge()
    {
        $this->owner()->where('current_company_id', $this->id)
                ->update(['current_company_id' => null]);

        $this->users()->where('current_company_id', $this->id)
                ->update(['current_company_id' => null]);

        $this->users()->detach();

        $this->delete();
    }

    public function pos()
    {
        return $this->hasMany(Pos::class);
    }

}

<?php

namespace App\Traits;

use App\Abstracts\Membership;
use App\Models\Company\Company;

trait HasCompany{

    /**
     * Determine if the given company is the current company.
     *
     * @param  mixed  $company
     * @return bool
     */
    public function isCurrentCompany($company)
    {
        return $company->id === $this->currentCompany->id;
    }

    /**
     * Get the current company of the user's context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentCompany()
    {
        if (is_null($this->current_company_id) && $this->id) {
            $this->switchCompany($this->personalCompany());
        }

        return $this->belongsTo(Company::class, 'current_company_id');
    }

    /**
     * Switch the user's context to the given company.
     *
     * @param  mixed  $company
     * @return bool
     */
    public function switchCompany($company)
    {
        if (! $this->belongsToCompany($company)) {
            return false;
        }

        $this->forceFill([
            'current_company_id' => $company->id,
        ])->save();

        $this->setRelation('currentCompany', $company);

        return true;
    }

    /**
     * Get all of the companies the user owns or belongs to.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allCompanies()
    {
        return $this->ownedCompanies->merge($this->companies)->sortBy('name');
    }

    /**
     * Get all of the companies the user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownedCompanies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * Get all of the companies the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, Membership::class)
                        ->withPivot('role')
                        ->withTimestamps()
                        ->as('membership');
    }


    /**
     * Get the user's "personal" company.
     *
     * @return \App\Models\Company\Company
     */
    public function personalCompany()
    {
        return $this->ownedCompanies->where('personal_company', true)->first();
    }


    /**
     * Determine if the user owns the given company.
     *
     * @param  mixed  $company
     * @return bool
     */
    public function ownsCompany($company)
    {
        if (is_null($company)) {
            return false;
        }

        return $this->id == $company->{$this->getForeignKey()};
    }


    /**
     * Determine if the user belongs to the given company.
     *
     * @param  mixed  $company
     * @return bool
     */
    public function belongsToCompany($company)
    {
        if (is_null($company)) {
            return false;
        }

        return $this->ownsCompany($company) || $this->companies->contains(function ($c) use ($company) {
            return $c->id === $company->id;
        });
    }

}

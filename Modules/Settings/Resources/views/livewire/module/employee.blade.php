@extends('layouts.master')

@section('title', __('Paramètres'))

@section('content')
<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row">

                <!--Employees -->
                <div class="settings_box" id="stats">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="bi bi-people" style="font-size: 15px;"></i> {{ __('Employés') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                    <div class="k_setting_left_pane">
                                        <div class="k_field_widget k_field_boolean">
                                            <div class="k-checkbox form-check d-inline-block">
                                                <input type="checkbox" checked class="form-check-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="k_setting_right_pane">
                                        <div class="mt- mt16">
                                            <div class="k_field_char k_readonly_modifier fw-bold">
                                                <span>{{ __('Contrôle des présences') }}</span>
                                            </div>
                                            <div class="k_field_text k_readonly_modifier text-muted">
                                                <span>{{ __('Basé sur le statut de l\'employé dans le système.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--Employees Rights -->
                <div class="settings_box" id="stats">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0"><i class="bi bi-person-circle" style="font-size: 15px;"></i> {{ __('Droits des employés') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="k_setting_box col-12 col-lg-6 k_searchable_setting">
                                    <div class="k_setting_left_pane">
                                        <div class="k_field_widget k_field_boolean">
                                            <div class="k-checkbox form-check d-inline-block">
                                                <input type="checkbox" class="form-check-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="k_setting_right_pane">
                                        <div class="mt- mt16">
                                            <div class="k_field_char k_readonly_modifier fw-bold">
                                                <span>{{ __('Edition personnelle') }}</span>
                                            </div>
                                            <div class="k_field_text k_readonly_modifier text-muted">
                                                <span>{{ __('Autoriser l\'employé à modifier ses propres informations.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

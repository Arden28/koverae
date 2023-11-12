@extends('layouts.master')

@section('title', __('Paramètres -'. $name ))

@section('styles')
    <style>
        .k_form_sheet{
            font-size: 14px;
            line-height: 21px;
            text-decoration: none solid rgb(55, 65, 81);
            word-spacing: 0px;
            background-color: #ffffff;
            background-position: 0% 0%;
            color: black;
            max-width: auto;
            min-width: auto;
            border: 1px solid #D8DADD;
            padding: 20px 20px 20px 20px;
            margin: 0px 24px 24px 24px;
        }
        .ke_title{
            height: 76px;
            max-width: 75%;
        }
        .ke_title .k_form_label{
            font-weight: 500;
            text-decoration: none solid rgb(17, 24, 39);
            height: 21px;
            width: auto;
        }
        .ke_title h1{
            font-size: 36px;
            font-weight: 500;
            line-height: 40px;
            height: 55px;
            min-height: 55px;
        }
        .ke_title .k_input{
            height: 43px;
            padding: 1px 0 1px 0;
            border-top: 0px solid #111827;
            border-left: 0px solid #111827;
            border-bottom: 0px solid #111827;
            border-right: 0px solid #111827;
            width: 100%;
        }
        .ke_title .k_input:hover{
            border-bottom: 1px solid #111827;
            outline: none;
        }
        .ke_title .k_input:focus{
            border-bottom: 1px solid #111827;
            outline: none;
        }
        .ke_title .k_select_file_button{
            position: absolute; /* Position the image absolutely */
            top: 0; /* Position it at the top */
            right: 0; /* Position it at the right */
            max-width: 25%; /* Set a maximum width for the image */
            height: auto; /* Maintain aspect ratio */
            margin: 1px; /* Add some margin for spacing */
        }
        .k_notebokk_headers{
            height: 38px;
            width: 100%;
            margin: 0 -24px 0 -24px;
            min-height: auto;
            min-width: auto;
            overflow: auto;
        }
        .k_notebokk_headers .nav{
            border-bottom: 1px solid #D8DADD;
            padding: 0 24px 0 24px;
        }
        .k_notebokk_headers .nav .nav-link{
            border: 1px solid #D8DADD;
        }
        .k_notebokk_headers .nav .active{
            background-color: #ffffff;
            border-left: 1px solid #111827;
            border-top: 1px solid #01eeffb0;
            border-bottom: 0px solid #ffffff;
            border-right: 1px solid #D8DADD;
            margin: 0 0 -1px 0;
            padding: 8px 16px 8px 16px;
        }
        .k_form_sheet .tab-pane{
            width: 100%;
            padding: 16px 0 16px 0;
        }
        .k_inner_group{
            margin: 0 0 8px 0;
            padding: 0 16px 0 16px;
            min-height: auto;
            min-width: auto;
        }
        .k_inner_group .k_wrap_label{
            width: 65px;
        }
        .k_inner_group .k_wrap_input{
            width: 95%;
        }
        .k_inner_group .k_wrap_input input{
            width: 100%;
            border-top: 0px solid #111827;
            border-left: 0px solid #111827;
            border-bottom: 0px solid #111827;
            border-right: 0px solid #111827;
            padding: 1px 0 1px 0;
        }
        .k_inner_group .k_wrap_input input:hover{
            border-bottom: 1px solid #111827;
            outline: none;
        }
        .k_inner_group .k_wrap_input input:focus{
            border-bottom: 1px solid #111827;
            outline: none;
        }
        .k_inner_group .k_form_label{
            margin: 0 0 5px 0;
            font-weight: 500;
            text-decoration: none solid rgb(17, 24, 39);
            height: 21px;
            width: 80px;
            min-width: auto;
        }
        /* input */
        .k_input{
            width: 100%;
            border-top: 0px solid #111827;
            border-left: 0px solid #111827;
            border-bottom: 0px solid #111827;
            border-right: 0px solid #111827;
            padding: 1px 0 1px 0;
        }
        .k_input:hover{
            border-bottom: 1px solid #111827;
            outline: none;
        }
        .k_input:focus{
            border-bottom: 1px solid #111827;
            outline: none;
        }
        /* TABS */
        .tab-pane {
            display: none;
        }
        .tab-pane.active {
            display: block;
        }
        /* TABLE */

        /* Set table width to 100% and add some spacing */
        /* .tab-pane table {
            width: 100%;
            border-collapse: collapse;
            font-variant: tabular-nums;
            text-decoration: none solid rgb(17, 24, 39);
        }
        .tab-pane table tbody{
            border: none solid #E7E9ED;
            white-space: nowrap;
            display: table-row-group;
        }
        .tab-pane table th {
            background-color: #ffffff;  Add a background color for the header row
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;  Add a border to the bottom of th elements */
        }
            /* .tab-pane table th span{
                font-weight: 500;
                width: 75%;
            }
            Define the CSS class for clicked th elements
            .clicked-th {
                background-color: #ff0000; /* Change this to your desired background color */
            }
            /* .tab-pane table th span i{
                font-size: 18px;
                line-height: 18px;
                text-align: left;
                vertical-align: -6px;
                word-spacing: 0px;
                padding: 0px 8px 0 38px;
                min-width: auto;
                min-height: auto;
                display: inline;
                left: 0;
            } */

        /* .tab-pane table td {
            height: 21px;
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            padding: 8px 24px 8px 24px;
        }
        .k_field_list_add{
            padding: 8px 24px 8px 5px;
            max-width: 100%;
        } */

    </style>
@endsection

@section('content')
<div>
    <div class="page-header d-print-none">
        <form wire:submit>
            <div class="k_form_sheet position-relative rounded-3">
                <div class="ke_title">
                    <label for="" class="k_form_label">
                        {{ __('Nom de l\'entreprise') }}
                    </label>
                    <h1>
                        <input type="text" class="k_input" wire:model="name" value="Banéo">
                        <div>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </h1>
                </div>
                <div class="k_select_file_button">
                    <!-- select file -->
                    <button class=" btn btn-light border-0 m-1 p-1">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <!-- trash -->
                    <button class="k_select_file_button btn btn-light border-0 m-1 p-1">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
                <div class="k_notebokk_headers">
                    <!-- Tab Link -->
                    <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" data-bs-toggle="tab" href="#info">{{ __('Informations générale') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->
                <!-- Tabs 1 -->
                <div class="tab-pane active show" id="info">
                    <div class="row">
                        <!-- Left Side -->
                        <div class="k_inner_group col-lg-6 col-md-6">
                            <!-- Phone -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Téléphone') }} :
                                    </label>
                                </div>
                                <div class="text-break k_cell k_wrap_input">
                                    <input type="tel" class="k_input" placeholder="Ex: +242069481592"">
                                </div>
                            </div>
                            <!-- Mobile -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Mobile') }} :
                                    </label>
                                </div>
                                <div class="text-break k_cell k_wrap_input">
                                    <input type="tel"  class="k_input" placeholder="Ex: +242064074926">
                                </div>
                            </div>
                            <!-- Email -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Email') }} :
                                    </label>
                                </div>
                                <div class="text-break k_cell k_wrap_input">
                                    <input type="email" class="k_input" value="laudbouetoumoussa@koverae.com">
                                </div>
                            </div>
                            <!-- Website -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Site Web') }} :
                                    </label>
                                </div>
                                <div class="text-break k_cell k_wrap_input">
                                    <input type="url" class="k_input" value="" placeholder="Ex: https://baneo.koverae.com">
                                </div>
                            </div>
                        </div>
                        <!-- Right Side -->
                        <div class="k_inner_group col-lg-6 col-md-6">
                            <!-- Adress -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Adresse') }} :
                                    </label>
                                </div>
                                <div class="k_address_format">
                                    <div class="row">
                                        <div class="col-12" style="margin-bottom: 10px;">
                                            <input type="text" id="street" class="k_input" placeholder="Rue 1....">
                                        </div>
                                        <div class="col-12" style="margin-bottom: 10px;">
                                            <input type="text" id="street2_0" class="k_input" placeholder="Rue 2......">
                                        </div>
                                        <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                            <input type="text" id="city_0" class="k_input" placeholder="Ville">
                                        </div>
                                        <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                            <select name="" class="k_input" id="state_id_0">
                                                <option value="">{{ __('Département') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                            <input type="text" id="zip_0" class="k_input" placeholder="Code postal">
                                        </div>
                                        <div class="col-12" style="margin-bottom: 10px;">
                                            <select name="" class="k_input" id="country_id_0">
                                                <option value="">{{ __('Pays') }}</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!-- TVA N° -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('N° TVA') }} :
                                    </label>
                                </div>
                                <div class="text-break k_cell k_wrap_input">
                                    <input type="text" class="k_input" value="">
                                </div>
                            </div>

                            <!-- Company ID -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('ID de l\'entreprise') }} :
                                    </label>
                                </div>
                                <div class="text-break k_cell k_wrap_input">
                                    <input type="text" class="k_input" value="">
                                </div>
                            </div>

                            <!-- Currency -->
                            <div style="margin-bottom: 10px;">
                                <div class="k_wrap_label text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Devise') }} :
                                    </label>
                                </div>
                                <div class="text-break k_cell k_wrap_input">
                                    <input type="text" class="k_input" value="XAF" disabled placeholder="XAF">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Tabs 2 -->
                <div class="tab-pane" id="affiliate">
                    <div class="k_field_widget k_fieldOne2Many">
                        <table>
                            <thead>
                                <tr>
                                    <th onclick="toggleBackgroundColor(this)">
                                        <span class="d-block text-truncate flex-grow-1 min-w-0">
                                            {{ __('Nom de l\'entreprise') }}
                                        <i class="bi bi-caret-down opacity-75-hover" style="width: 27px; height: 21px;"></i>
                                        </span>
                                    </th>
                                    <th onclick="toggleBackgroundColor(this)">
                                        <span class="d-block text-truncate flex-grow-1 min-w-0">
                                            {{ __('Entreprise mère') }}
                                        <i class="bi bi-caret-down opacity-75-hover" style="width: 27px; height: 21px;"></i>
                                        </span>
                                    </th>
                                    <th onclick="toggleBackgroundColor(this)">
                                        <span class="d-block text-truncate flex-grow-1 min-w-0">
                                            {{ __('Filiales') }}
                                        <i class="bi bi-caret-down opacity-75-hover" style="width: 27px; height: 21px;"></i>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="ui-sortable">
                                <tr>
                                    <td class="k_field_list_add"><a href="">{{ __('Ajouter une entreprise') }}</a></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Use jQuery to handle click events on table headers
    $(document).ready(function () {
        $('table th').click(function () {
            // Toggle the background color class on the clicked th element
            $(this).toggleClass('clicked-th');
        });
    });
</script>
@endsection

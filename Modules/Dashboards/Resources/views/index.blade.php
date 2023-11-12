@extends('layouts.master')

@section('title', __('Tableaux de bord'))

@section('styles')
    <style>
        .k_spreadsheet_dashboard{
            font-size: 14px;
            line-height: 21px;
            text-decoration: none solid rgb(55, 65, 81);
            word-spacing: 0px;
            padding: 0 8px 48px 24px;
            min-height: auto;
            max-width: 200px;
            min-width: auto;
            display: block;
        }
        .k_spreadsheet_dashboard .k_search_panel_section_header{
            height: 50px;
            width: 100%;
            padding: 24px 0 8px 0 ;
            position: relative;
            overflow-x: auto;
            overflow-y: hidden;
        }
        .k_spreadsheet_dashboard .k_search_panel_category{
            text-decoration: none solid rgb(17, 24, 39);
            text-align: left;
            white-space: nowrap;
            height: 29px;
            width: 75px;
            padding: 4px 8px 4px 12px;
            cursor: pointer;
        }
        .k_spreadsheet_dashboard .k_search_panel_category.active{
            background-color: #E6F2F3;
            color: #017E84;
        }
        .k-grid-overlay{
            /* height: 545px; */
            width: 1000px;
            top: 0px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            display: block;
        }
        .k-scorecard{
            background-color: #bdbdbd;
            height: 120px;
            /* width: 200px; */
            padding: 4px 4px 4px 4px;
            margin: 4px 4px 4px 4px;
            cursor: pointer;
        }
        .k-grid-overlay .stat{
            font-size: 42px;
            line-height: 45px;
        }
        .k-grid-overlay .card-title{
            font-size: 22px;
            line-height: 24px;
        }
    </style>
@endsection

@section('content')
    <div class="page-body d-print-none">
        <div class="row">

            <div class="k_spreadsheet_dashboard search_panel k_flex_panel flex-grow-0 border-end flex-shrink-0 pe-2 pb-5 ps-4 bg-view overflow-auto col-lg-2 col-md-2">

                @foreach($dashboards as $d)
                    @if($d->appDashboard->count() > 0)
                        <header class="k_search_panel_section_header ps-4 pl-2 text-uppercase user-select-none">
                            <b>{{ $d->name }}</b>
                        </header>
                        <ul>

                            @foreach ($d->appDashboard as $dash)
                                <li class="k_search_panel_category list-group-item border-0">
                                    {{ $dash->name }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
            <!-- The correspendant data play -->

        </div>
    </div>
@endsection

<div>
    @section('title', 'Tableaux de bord')

    @section('styles')
        <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
          body::-webkit-scrollbar {
              display: none;
          }

          /* Hide scrollbar for IE, Edge, and Firefox */
          body {
            overflow-y: hidden;
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
          }
          .app-sidebar{
            height: 90vh;
            overflow-y: auto;
          }
          .panel-category:hover{
            background-color: #D8DADD;
          }
          .panel-category.selected{
            background-color: #E6F2F3;
          }
            .app{
                background-color: white;
                padding: 8px 8px 8px 8px;
                height: 120px;
                width: 340px;
                min-height: auto;
                min-width: auto;
                display: flex;
                border: 1px solid #D8DADD;
            }
            .app .app_desc{
                height: 77px;
                width: 280px;
                padding: 0 0 0 10px;
                min-height: auto;
            }
            .app .app_desc .k_kanban_record_title{
                font-weight: bold;
                font-size: 15.6px;
            }
            .app .app_icon{
                height: 40px;
                width: 40px;
            }
        </style>
    @endsection

    <div class="page-body h-screen m-0">
      <div class="container-fluid h-screen">
        <div class="row g-4 h-screen">
            <!-- Side Bar -->
            <div class="col-md-2 bg-white app-sidebar flex-grow-0 flex-shrink-0 h-screen mb-5 bg-view overflow-auto position-relative pe-1 ps-3">
                <form action="./" method="get" autocomplete="off" novalidate class="sticky-top">

                @foreach ($dashboards as $dash)
                    @if(dashboard_installed($dash->slug)->count() >= 1)
                    <header class="form-label pt-3 font-weight-bold text-uppercase"> <b><i class="bi bi-folder"></i> {{ $dash->name }}</b></header>
                    <ul class="mb-2 ml-2">
                        @if($dash->appDashboards())
                            @foreach ($dash->appDashboards()->get() as $app)
                                @if(dashboard($app->slug))
                                <li class="text-decoration-none panel-category {{ $app->slug == $this->view ? 'selected' : '' }} py-1 pe-0 ps-0 cursor-pointer" wire:click="changeDash('{{ $app->slug }}')" wire:target="changeDash">
                                {{ $app->name }}
                                </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                    @endif
                @endforeach

                </form>
            </div>
            <!-- Apps Dashboard -->
            <div class="col-12 col-md-12 col-lg-10 h-screen">
                @if($this->view == 'sales_dashboard')
                <livewire:dashboards::dashboard-app.sales-dashboard />
                @elseif ($this->view == 'products_dashboard')
                <livewire:dashboards::dashboard-app.products-dashboard />
                @elseif ($this->view == 'pos_dashboard')
                <livewire:dashboards::dashboard-app.pos-dashboard />
                @elseif ($this->view == 'rental_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'accounting_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'employee_expenses_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'invoices_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'purchases_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'suppliers_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'inventory_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'stock_flow_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'manufacturing_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'projects_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'timesheets_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'leads_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'pipelines_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'subscriptions_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'mrr_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'rentention_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @elseif ($this->view == 'salesperson_dashboard')
                <livewire:dashboards::dashboard-app.invoices-dashboard />
                @else
                @endif
            </div>
        </div>
      </div>
    </div>
    <!-- Loading -->
    <div class="k-loading cursor-pointer pb-1" wire:loading>
        <p>En cours de chargement ...</p>
    </div>
</div>

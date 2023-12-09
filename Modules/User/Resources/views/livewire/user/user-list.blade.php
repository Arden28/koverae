<div>
    @section('title', __('Utilisateurs'))

    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')
            <!-- Table -->
            <livewire:user::table.users-table />
        </div>
    </div>
</div>

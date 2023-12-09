<div>
    @section('title', 'Contacts')
    <div class="page-body d-print-none">
        <div class="container-fluid">
            <!-- Notify -->
            @include('notify::components.notify')

            <livewire:contact::table.contacts-table />

        </div>
    </div>
</div>

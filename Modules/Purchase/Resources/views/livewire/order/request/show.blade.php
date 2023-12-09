<div>
    @section('title', __($request->reference))

    <!-- Notify -->
    @include('notify::components.notify')
    <livewire:purchase::form.request-quotation-form :request="$request" />
</div>

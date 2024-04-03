@props([
    'value',
])
@php
    $session = \Modules\Pos\Entities\Session\PosSession::find($value);
@endphp
<div>
    {{ $session->reference }}
</div>

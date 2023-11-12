@extends('layouts.master')

@section('title', 'Ajouter un employé')

@section('content')
<div>
    <livewire:employee::employees.create/>
</div>
@endsection

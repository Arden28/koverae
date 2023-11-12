@extends('layouts.master')

@section('title', $employee->user->name)

@section('content')
<div>
    <livewire:employee::employees.show :employee="$employee->id" />
</div>
@endsection

@extends('layouts.master')

@section('title', $team->name)

@section('content')
    <livewire:sales::team.show :team="$team" />
@endsection

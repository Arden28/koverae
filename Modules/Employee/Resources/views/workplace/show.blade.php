@extends('layouts.master')

@section('title', $workplace->title)


@section('content')
<div>
    <livewire:employee::workplace.show :workplace="$workplace" />
</div>
@endsection

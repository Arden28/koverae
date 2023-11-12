@extends('layouts.master')

@section('title', $job->title)

@section('content')
<div>
    <livewire:employee::job.show :job="$job"/>
</div>
@endsection

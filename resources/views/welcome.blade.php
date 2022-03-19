@extends('layouts.app')

@section('navbar')
@endsection

@section('sidenav')
@endsection

@section('content')
    <div class="container">
        <h3>Welcome to Our Hospital Management System.</h3>
        <a class="btn btn-primary btn-lg text-white" href="{{ route('hospital.create') }}">Create Your Hospital</a>
    </div>
@endsection
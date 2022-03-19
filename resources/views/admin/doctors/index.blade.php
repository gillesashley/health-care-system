@extends('layouts.app')

@section('content')
<div class="page-wrapper" style="min-height: 689px;">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Doctors</h4>
                @if (session('success'))
                    {{ session('success') }}
                @endif
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>
                    Add Doctor</a>
            </div>
        </div>
        <div class="row doctor-grid">
            @foreach ($doctors as $doctor)
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a href="profile.html" class="avatar"><img alt="" src="{{ $doctor->image ? asset('storage/'.$doctor->image):asset('frontend/img/doctor-thumb-03.jpg') }}"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.doctors.edit',['doctor'=> $doctor->id]) }}"><i class="fa fa-pencil m-r-5"></i>
                                Edit</a>
                                <form action="{{ route('admin.doctors.destroy', ['doctor'=> $doctor->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="dropdown-item" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                </form>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">{{ $doctor->firstname }} {{ $doctor->lastname }}</a></h4>
                    <div class="doc-prof">Gynecologist</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> {{ $doctor->country }}, {{ $doctor->state }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

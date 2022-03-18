@extends('layouts.app')

@section('content')
<div class="page-wrapper" style="min-height: 689px;">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Doctor</h4>
                @if (session('success'))
                    {{ session('success') }}
                @endif

                @if($errors->any())
                    <span>Errors found</span>
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="{{ route($route_name,['doctor'=> $doctor->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ $route_method != 'POST'? method_field('PATCH'): ''}}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstname">First Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('firstname') is-invalid @enderror" type="text" id="firstname" name="firstname" value="{{ old('firstname', $doctor->firstname?? '' )}}">

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input class="form-control @error('lastname') is-invalid @enderror" type="text" id="lastname" name="lastname" value="{{ old('lastname', $doctor->lastname?? '' )}}">

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="username">Username <span class="text-danger">*</span></label>
                                <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{ old('username', $doctor->username?? '' )}}">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>

                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email', $doctor->email?? '' )}}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password"  required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" required name="confirm_password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $doctor->dob?? '' )}}" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label" for="gender">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="M" checked="{{ old('gender',$doctor->gender) == 'M'}}">Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender"  class="form-check-input" value="F" checked="{{ old('gender',$doctor->gender) == 'F'}}">Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $doctor->address?? '' )}}">
                                    </div>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control select select2-hidden-accessible" tabindex="-1"
                                            aria-hidden="true" id="country" name="country" value="{{ old('country', $doctor->country?? '' )}}">
                                            <option value="USA">USA</option>
                                            <option value="UK">United Kingdom</option>
                                            <option value="Ghana">Ghana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="state">State/Region</label>
                                        <select class="form-control select select2-hidden-accessible" tabindex="-1"
                                            aria-hidden="true" id="state" name="state" value="{{ old('state', $doctor->state?? '' )}}">
                                            <option value="Greater Accra">Greater Accra</option>
                                            <option value="Ashanti Region">Ashanti Region</option>
                                            <option value="Easter Region">Eastern Region</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $doctor->city?? '' )}}">

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone </label>
                                <input class="form-control" type="text @error('title') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $doctor->phone?? '' )}}">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="profile-upload">
                                    <div class="upload-img">
                                        <img alt="" src="{{ asset('frontend/img/user.jpg') }}">
                                        <img src="{{ asset('storage/'.old('image',$doctor->image)) }}" alt="">
                                    </div>
                                    <div class="upload-input">
                                        <input type="file" class="form-control" name="image" value="{{ old('image', $doctor->image?? '' )}}" id="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_bio">Short Biography</label>
                        <textarea class="form-control" rows="3" cols="30" id="short_bio" name="short_bio" value="{{ old('short_bio', $doctor->short_bio)?? '' }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="display-block" for="status">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="1" id="doctor_active"
                             checked="{{ in_array(old('status',$doctor->status),["1",1, true]) }}">
                            <label class="form-check-label" for="doctor_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="0" id="doctor_inactive"
                              checked={{ in_array(old('status',$doctor->status),["0",0, false])  }}>
                            <label class="form-check-label" for="doctor_inactive">
                                Inactive
                            </label>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn">{{in_array('edit',explode('.',$route_name))? 'Update': 'Create Doctor'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

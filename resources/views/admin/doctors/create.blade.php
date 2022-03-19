@extends('layouts.app')

@section('content')
<div class="page-wrapper" style="min-height: 689px;">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Doctor</h4>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
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
                        <div class="col-md-12 m-t-20">

                            <label for="change_password">Change password <span class="text-muted">check to change your password</span></label>
                            <input type="checkbox" id="change_password" onchange="includePasswordFields(this.checked)" {{ $route_name == "admin.doctors.store" ? 'checked=true disabled': ''}}>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" x-form-field="password" type="password" id="password" {{ $route_name == 'admin.doctors.store'? 'required':''}}>

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
                                <input class="form-control" x-form-field="password_confirmation" type="password" {{ $route_name == 'admin.doctors.store'? 'required':''}}>

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
                                    <input type="text" class="form-control datetimepicker @error('dob') is-invalid @enderror" data-date-format="Y-MM-DD" id="dob" name="dob" value="{{ old('dob', $doctor->dob?? '' )}}" type="date" pattern="\d{4}-[0-1][0-9]-\d{2}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label" for="gender">Gender:</label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input" value="M" {{ old('gender',$doctor->gender) == 'M'? 'checked': ''}}>Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender"  class="form-check-input" value="F" {{ old('gender',$doctor->gender) == 'F'? 'checked': ''}}>Female
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
                                <input class="form-control" type="text @error('title') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $doctor->phone?? '' )}}" required>

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
                                    <div class="upload-input">
                                        <input type="file" class="form-control" name="image" value="{{ old('image', $doctor->image?? '' )}}" id="image" onchange="handleProfileImgChange(this.files)" {{$route_name == "admin.doctors.store"? 'required':''}}>
                                    </div>
                                    <div class="upload-img">
                                        <img src="{{ old('image',asset('storage/'. $doctor->image)) }}" alt="new doctor profile" class="w-100 h-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_bio">Short Biography</label>
                        <textarea class="form-control" rows="3" cols="30" id="short_bio" name="short_bio">{{ old('short_bio', $doctor->short_bio)?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="display-block" for="status">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="1" id="doctor_active"
                             {{ in_array(old('status',$doctor->status),["1",1, true])? 'checked': '' }}>
                            <label class="form-check-label" for="doctor_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="0" id="doctor_inactive"
                              {{ in_array(old('status',$doctor->status),["0",0, false])? 'checked': ''  }}>
                            <label class="form-check-label" for="doctor_inactive">
                                Inactive
                            </label>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn">{{in_array('store',explode('.',$route_name))? 'Create Doctor':'Update'}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function handleProfileImgChange(/**@type File*/ [file]){
        console.log(file)
        let reader = new FileReader()
        reader.onload = ()=> document.querySelector('img[alt="new doctor profile"]').setAttribute('src', reader.result)
        reader.readAsDataURL(file)
    }

    function includePasswordFields(should_include = false){

        console.log('includePasswordFields:fired')
        /**@type Element */
        let e_password = document.querySelector('[x-form-field="password"]')
        let e_password_confirmation = document.querySelector('[x-form-field="password_confirmation"]')

        if (should_include){
            e_password.setAttribute('name','password')
            e_password_confirmation.setAttribute('name','password_confirmation')
            e_password.setAttribute('required','required')
            e_password_confirmation.setAttribute('required','required')
            e_password.removeAttribute('disabled')
            e_password_confirmation.removeAttribute('disabled')
        }

        else{
            e_password.removeAttribute('name')
            e_password_confirmation.removeAttribute('name')
            e_password.removeAttribute('required')
            e_password_confirmation.removeAttribute('required')
            e_password.setAttribute('disabled','disabled')
            e_password_confirmation.setAttribute('disabled','disabled')

        }
    }

    includePasswordFields({{ $route_name == 'admin.doctors.store'}})
</script>
@endsection

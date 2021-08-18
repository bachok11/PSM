@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register_user') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus />

                                @if ($errors->has('name'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('name') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus />

                                @if ($errors->has('lastname'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('lastname') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input type="radio" name="gender" value="0" checked />{{ Male }}
                                <input type="radio" name="gender" value="1" /> {{ Female }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    <option value="">{{ Select Role }}</option>
                                    @if(!empty($roles))
                                    @foreach($roles as $key)
                                    <option value="{{ $key->id }}">{{ $key->role_name }}</option>
                                    @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('role'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('role') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_ic" class="col-md-4 col-form-label text-md-right">{{ __('Number IC') }}</label>

                            <div class="col-md-6">
                                <input id="no_ic" type="no_ic" class="form-control @error('no_ic') is-invalid @enderror" name="no_ic" value="{{ old('no_ic') }}" autocomplete="no_ic" />

                                @if ($errors->has('no_ic'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('no_ic') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" />

                                @if ($errors->has('email'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('email') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile_no" type="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" autocomplete="mobile_no" />

                                @if ($errors->has('mobile_no'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('mobile_no') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" />

                                @if ($errors->has('address'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('address') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" />

                                @if ($errors->has('password'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('password') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image (PNG)') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image" />

                                @if ($errors->has('image'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('image') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="appointment_letter" class="col-md-4 col-form-label text-md-right">{{ __('Appointment Letter (PNG)') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="appointment_letter" />

                                @if ($errors->has('appointment_letter'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('appointment_letter') }}</span>
								</span>
								@endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
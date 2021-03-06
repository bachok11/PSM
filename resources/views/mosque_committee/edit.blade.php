@extends('layouts.main')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs col-sm-6">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs bar_tabs" role="tablist">
                            <li class="pt-2 px-3">
                                <h3 class="card-title">Mosque Committee</h3>
                            </li>
                            <li class="nav-item">
                                <a href="{!! url('/mosque_committee/list')!!}" class="nav-link" aria-selected="true">List Mosque Committee</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link active" aria-selected="false">Edit Mosque Committee</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane">
                                <div class="card-body">
                                    <form method="post" action="{!! url('/mosque_committee/edit/update/'.$mosqueCommittee_data->id) !!}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" name="name" class="form-control" placeholder="Enter First Name" value="{{ $mosqueCommittee_data->name }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" value="{{ $mosqueCommittee_data->lastname }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>IC Number</label>
                                                    <input type="text" name="no_ic" class="form-control" placeholder="Enter IC Number" value="{{ $mosqueCommittee_data->no_ic }}" />
                                                    @if ($errors->has('no_ic'))
                                                    <span class="help-block">
                                                        <span class="text-danger">{{ $errors->first('no_ic') }}</span>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $mosqueCommittee_data->email }}" />
                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                    <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile Number" value="{{ $mosqueCommittee_data->mobile_no }}" />
                                                    @if ($errors->has('mobile_no'))
                                                    <span class="help-block">
                                                        <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                                    <label>/</label>
                                                    <span class="input-group-addon"><i class="fa fa-female"></i></span>
                                                    <div class="form-group">
                                                        <input type="radio" name="gender" value="0" <?php if ($mosqueCommittee_data->gender == 0) {
                                                                                                        echo "checked";
                                                                                                    } ?> checked> {{ Male }}
                                                        <input type="radio" name="gender" value="1" <?php if ($mosqueCommittee_data->gender == 1) {
                                                                                                        echo "checked";
                                                                                                    } ?>> {{ Female }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $mosqueCommittee_data->address }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Daerah</label>
                                                    <select name="daerah" class="form-control select_daerah">
                                                        <option value="">{{ Select Daerah }}</option>
                                                        @if(!empty($daerah))
                                                        @foreach($daerah as $key)
                                                        <option value="{{ $key->daerahID }}" <?php if ($mosqueCommittee_data->daerahID == $key->daerahID) {
                                                                                                    echo "selected";
                                                                                                } ?>>{{ $key->name }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Mukim</label>
                                                    <select name="mukim" class="form-control mukim_of_daerah">
                                                        <option value="">{{ Select Mukim }}</option>
                                                        @if(!empty($daerah))
                                                        @foreach($mukim as $key)
                                                        <option value="{{ $key->mukimID }}" <?php if ($mosqueCommittee_data->mukimID == $key->mukimID) {
                                                                                                echo "selected";
                                                                                            } ?>>{{ $key->name }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <input type="text" name="gender" class="form-control" value="{{ $mosqueCommittee_data->role }}" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group {{ $errors->has('approved') ? 'has-error' : '' }}">
                                                    <label> Approved </label>
                                                    <input name="approved" type="hidden" value="0">
                                                    <input value="1" type="checkbox" name="is_approved" {{ (isset($mosqueCommittee_data) && $mosqueCommittee_data->is_approved) || old('is_approved', 0) === 1 ? 'checked' : '' }}>
                                                    @if($errors->has('approved'))
                                                    <p class="help-block">
                                                        {{ $errors->first('approved') }}
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Mosque</label>
                                                <select name="mosque" class="form-control">
                                                    <option value="">{{ Select Mosque }}</option>
                                                    @if(!empty($mosque))
                                                    @foreach($mosque as $key)
                                                    <option value="{{ $key->mosqueID }}">{{ $key->mosque_name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('masjid'))
                                                <span class="help-block">
                                                    <span class="text-danger">{{ $errors->first('masjid') }}</span>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Profile Picture</label>
                                                <input type="file" class="form-control" name="image" value="{{ $mosqueCommittee_data->image }}"/>

                                                @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Account Number</label>
                                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                    <input type="text" name="account_no" class="form-control" placeholder="Enter Account Number" value="{{ $mosqueCommittee_data->account_no }}" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Appointment Letter</label>
                                                    <input type="text" name="appointment_letter" class="form-control" placeholder="Enter Appointment Letter" value="{{ $mosqueCommittee_data->appointment_letter }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <div class="col-md-18 col-sm-18 col-xs-18 text-center">
                                                <a class="btn btn-danger" href="{{ URL::previous() }}">{{ Cancel }}</a>
                                                <input type="submit" class="btn btn-success" value="{{ Save }}" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {

        $('.select_daerah').on('change', function() {
            daerahid = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ url('/getmukimfromdaerah') }}",
                data: {
                    daerahID: daerahid
                },
                success: function(response) {
                    $('.mukim_of_daerah').html(response);
                },
                error: function(response, status, error) {
                    var r = jQuery.parseJSON(response.responseText);
                    alert("Message: " + r.Message);
                    alert("StackTrace: " + r.StackTrace);
                    alert("ExceptionType: " + r.ExceptionType);
                }
            });
        });
    });
</script>
@endsection
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
							<li class="pt-2 px-3"><h3 class="card-title">Quran Teacher</h3></li>
							<li class="nav-item">
								<a href="{!! url('/quran_teacher/list')!!}" class="nav-link"  aria-selected="true">List Quran Teachers</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link active" aria-selected="false">Edit Quran Teacher</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
          	<div class="col-md-3">

            <!-- Profile Image -->
            <!-- <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
            </div> -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Mosque Committee</h3>
              </div>
			  <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  Bachelor in Computer Science at UTM
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Johor</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">Business</span>
                  <span class="tag tag-success">Communication</span>
                  <span class="tag tag-info">Leadership</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane">
					<div class="card-body">
                        <form method="post" action="{!! url('/quran_teacher/edit/update/'.$quranTeacher_data->id) !!}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="Enter First Name" value="{{ $quranTeacher_data->name }}" />
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" value="{{ $quranTeacher_data->lastname }}" />
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>IC Number</label>
                                    <input type="text" name="no_ic" class="form-control" placeholder="Enter IC Number" value="{{ $quranTeacher_data->no_ic }}" />
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
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $quranTeacher_data->email }}" />
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
                                    <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile Number" value="{{ $quranTeacher_data->mobile_no }}" />
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
                                            <input type="radio" name="gender" value="0"  <?php if($quranTeacher_data->gender == 0) { echo "checked"; }?> checked>  {{ Male }}
                                            <input type="radio" name="gender" value="1" <?php if($quranTeacher_data->gender == 1) { echo "checked"; }?>> {{ Female }}
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $quranTeacher_data->address }}" />
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Daerah</label>
                                        <select name="daerah"  class="form-control select_daerah">
                                            <option value="">{{ Select Daerah }}</option>
                                            @if(!empty($daerah))
                                                @foreach($daerah as $key)
                                                    <option value="{{ $key->daerahID }}" <?php if($quranTeacher_data->daerahID == $key->daerahID){ echo "selected"; }?>>{{ $key->name }}</option>	
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('daerah'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('daerah') }}</span>
                                        </span>
                                        @endif
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
                                                    <option value="{{ $key->mukimID }}" <?php if($quranTeacher_data->mukimID == $key->mukimID){ echo "selected"; }?>>{{ $key->name }}</option>	
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('mukim'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('mukim') }}</span>
                                        </span>
                                        @endif
                                </div>
                            </div>		
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>School Name</label>
                                    <span class="input-group-addon"></span>
                                    <input type="text" name="school_name" class="form-control" placeholder="Enter School Name" value="{{ $quranTeacher_data->school_name }}" />
                                    @if ($errors->has('school_name'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('school_name') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    <input type="text" name="account_no" class="form-control" placeholder="Enter Account Number" value="{{ $quranTeacher_data->account_no }}"/>
                                    @if ($errors->has('account_no'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('account_no') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Appointment Letter</label>
                                    <input type="text" name="appointment_letter" class="form-control" placeholder="Enter Appointment Letter" value="{{ $quranTeacher_data->appointment_letter }}"/>
                                    @if ($errors->has('appointment_letter'))
                                        <span class="help-block">
                                            <span class="text-danger">{{ $errors->first('appointment_letter') }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">  
                            <div class="col-md-18 col-sm-18 col-xs-18 text-center" >
                                <a class="btn btn-danger" href="{{ URL::previous() }}">{{ Cancel }}</a>
                                <input type="submit" class="btn btn-success"  value="{{ Save }}"/>
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

	$('.select_daerah').on('change', function(){
		daerahid = $(this).val();
		$.ajax({
			type:'GET',
			url: "{{ url('/getmukimfromdaerah') }}",
			data:{ daerahID:daerahid },
			success:function(response){
				$('.mukim_of_daerah').html(response);
			},
			error: function (response, status, error) {
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
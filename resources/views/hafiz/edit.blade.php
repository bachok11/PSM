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
							<li class="pt-2 px-3"><h3 class="card-title">Hafiz</h3></li>
							<li class="nav-item">
								<a href="{!! url('/hafiz/list')!!}" class="nav-link"  aria-selected="true">List Hafiz</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link active" aria-selected="false">Edit Hafiz</a>
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
                <h3 class="card-title">About Hafiz</h3>
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
                        <form method="post" action="{!! url('/hafiz/edit/update/'.$hafiz_data->hafizID) !!}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" value="{{ $hafiz_data->name }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" value="{{ $hafiz_data->lastname }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>IC Number</label>
                                    <input type="text" name="no_ic" class="form-control" placeholder="Enter IC Number" value="{{ $hafiz_data->no_ic }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $hafiz_data->email }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile Number" value="{{ $hafiz_data->mobile_no }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                        <span class="input-group-addon"><i class="fa fa-male"></i></span>
                                    <label>/</label>
                                        <span class="input-group-addon"><i class="fa fa-female"></i></span>
                                        <div class="form-group">
                                            <input type="radio"  name="gender" value="0"  <?php if($hafiz_data->gender == 0) { echo "checked"; }?> checked>  {{ Male }}
                                            <input type="radio" name="gender" value="1" <?php if($hafiz_data->gender == 1) { echo "checked"; }?>> {{ Female }}
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ $hafiz_data->address }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Daerah</label>
                                        <select name="daerah"  class="form-control select_daerah">
                                            <option value="">{{ Select Daerah }}</option>
                                            @if(!empty($daerah))
                                                @foreach($daerah as $key)
                                                    <option value="{{ $key->daerahID }}" <?php if($hafiz_data->daerahID == $key->daerahID){ echo "selected"; }?>>{{ $key->name }}</option>	
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
                                                    <option value="{{ $key->mukimID }}" <?php if($hafiz_data->mukimID == $key->mukimID){ echo "selected"; }?>>{{ $key->name }}</option>	
                                                @endforeach
                                            @endif
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Number of Juzuk</label>
									<select name="test_type"  class="form-control">
                                        <option value="{{ $hafiz_data->id }}" <?php if($hafiz_data->id_juzuk == $key->test_type){ echo "selected"; }?>>{{ $hafiz_data->id_juzuk }}</option>	
										<option value="1">{{ trans('Type 1 (Juzuk 1 - 10)') }}</option>
										<option value="2">{{ trans('Type 2 (Juzuk 11 - 20)') }}</option>	
										<option value="3">{{ trans('Type 3 (Juzuk 21 - 30)') }}</option>
									</select>
                                    @if ($errors->has('test_type'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('test_type') }}</span>
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
                                    <input type="text" name="account_no" class="form-control" placeholder="Enter Account Number" value="{{ $hafiz_data->account_no }}"/>
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
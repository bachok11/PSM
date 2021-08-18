@extends('layouts.main')
@section('content')

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
								<a href="{!! url('/mosque_committee/add')!!}" class="nav-link active" aria-selected="false">Add Mosque Committee</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Add Mosque Committee Details</h3>
			</div>

			<div class="card-body">
				<form method="post" action="{!! url('/mosque_committee/store_committee') !!}">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>First Name</label>
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input type="text" name="name" class="form-control" placeholder="Enter First Name">
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
								<input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
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
								<input type="text" name="no_ic" class="form-control" placeholder="Enter IC Number">
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
								<input type="email" name="email" class="form-control" placeholder="Enter Email">
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
								<input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile Number">
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
								<div class="col-md-8 col-sm-8 col-xs-12 gender">
									<input type="radio" name="gender" value="0" checked>{{ Male }}
									<input type="radio" name="gender" value="1"> {{ Female }}
								</div>
								@if ($errors->has('gender'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('gender') }}</span>
								</span>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Address</label>
								<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
								<input type="text" name="address" class="form-control" placeholder="Enter Address">
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
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select name="daerah" class="form-control select_daerah">
										<option value="">{{ Select Daerah }}</option>
										@if(!empty($daerah))
										@foreach($daerah as $key)
										<option value="{{ $key->daerahID }}">{{ $key->name }}</option>
										@endforeach
										@endif
									</select>
								</div>
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
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select name="mukim" class="form-control mukim_of_daerah">
										<option value="">{{ Select Mukim }}</option>
									</select>
								</div>
								@if ($errors->has('mukim'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('mukim') }}</span>
								</span>
								@endif
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Role</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select name="role" class="form-control">
										<option value="">{{ Select Role }}</option>
										<option value="5">{{ Imam }}</option>
										<option value="6">{{ Bilal }}</option>
										<option value="7">{{ Kariah }}</option>
									</select>
								</div>
								@if ($errors->has('role'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('role') }}</span>
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
								<input type="text" name="account_no" class="form-control" placeholder="Enter Account Number">
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
								<!-- <input type="text" name="appointment_letter" class="form-control" placeholder="Enter Appointment Letter">
								@if ($errors->has('appointment_letter'))
								<span class="help-block">
									<span class="text-danger">{{ $errors->first('appointment_letter') }}</span>
								</span>
								@endif -->
								<input type="file" class="form-control" name="appointment_letter" />
								@error('appointment_letter')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
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
					</div>
					<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
						<div class="col-md-18 col-sm-18 col-xs-18 text-center">
							<a class="btn btn-danger" href="{{ URL::previous() }}">{{ Cancel }}</a>
							<input type="submit" class="btn btn-success" value="{{ Add }}" />
						</div>
					</div>
				</form>
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
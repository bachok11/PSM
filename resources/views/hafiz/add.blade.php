@extends('layouts.main')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-12">
            	<div class="card card-primary card-outline card-outline-tabs col-sm-6">
              		<div class="card-header p-0 pt-1">
						<ul class="nav nav-tabs bar_tabs" role="tablist">
							<li class="pt-2 px-3"><h3 class="card-title">Mosque Committee</h3></li>
							<li class="nav-item">
								<a href="{!! url('/mosque_committee/list')!!}" class="nav-link"  aria-selected="true">List Mosque Committee</a>
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
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<div class="card-body">
				<form method="post" action="{!! url('/mosque_committee/store') !!}">
				@csrf
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>First Name</label>
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" name="firstname" class="form-control" placeholder="Enter First Name">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lastname" class="form-control" placeholder="Enter Last Name">
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>IC Number</label>
							<input type="text" name="no_ic" class="form-control" placeholder="Enter IC Number">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" class="form-control" placeholder="Enter Email">
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>Mobile Number</label>
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<input type="text" name="mobile_no" class="form-control" placeholder="Enter Mobile Number">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Gender</label>
							<span class="input-group-addon"><i class="fa fa-male"></i></span>
							<label>/</label>
							<span class="input-group-addon"><i class="fa fa-female"></i></span>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<select name="gender"  class="form-control">
									<option value="">{{ trans('app.Select Gender')}}</option>
									<option value="Male">{{ trans('app.Male') }}</option>	
									<option value="Female">{{ trans('app.Female') }}</option>
								</select>
							</div>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>Address</label>
							<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
							<input type="text" name="address" class="form-control" placeholder="Enter Address">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Daerah</label>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<select name="daerah"  class="form-control select_daerah">
									<option value="">{{ trans('app.Select Daerah')}}</option>
									@if(!empty($daerah))
										@foreach($daerah as $key)
											<option value="{{ $key->daerahID }}">{{ $key->name }}</option>	
										@endforeach
									@endif
								</select>
							</div>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Mukim</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select name="mukim" class="form-control mukim_of_daerah">
									</select>
								</div>
							</div>
						</div>		
						<div class="col-sm-6">
							<div class="form-group">
								<label>Role</label>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<select name="role"  class="form-control">
										<option value="">{{ trans('app.Select Role')}}</option>
										<option value="1">{{ trans('app.Imam') }}</option>	
										<option value="2">{{ trans('app.Bilal') }}</option>	
										<option value="3">{{ trans('app.Kariah') }}</option>	
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Mosque Name</label>
								<span class="input-group-addon"></span>
								<input type="text" name="mosque_name" class="form-control" placeholder="Enter Mosque Name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Account Number</label>
								<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
								<input type="text" name="account_no" class="form-control" placeholder="Enter Account Number">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Appointment Letter</label>
								<input type="text" name="appointment_letter" class="form-control" placeholder="Enter Appointment Letter">
							</div>
						</div>
					</div>
				  	<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">  
						<div class="col-md-18 col-sm-18 col-xs-18 text-center" >
							<a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('app.Cancel')}}</a>
							<input type="submit" class="btn btn-success"  value="{{ trans('app.Add')}}"/>
						</div>
					</div>
                </form>
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
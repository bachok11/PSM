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
			<div class="card-body">
				<form method="post" action="{!! url('mosque_committee/add') !!}" enctype="multipart/form-data"  class="form-horizontal upperform">
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>First Name</label>
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" placeholder="Enter First Name">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" placeholder="Enter Last Name">
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>IC Number</label>
							<input type="text" class="form-control" placeholder="Enter IC Number">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="text" class="form-control" placeholder="Enter Email">
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>Mobile Number</label>
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<input type="text" class="form-control" placeholder="Enter Mobile Number">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Gender</label>
							<span class="input-group-addon"><i class="fa fa-male"></i></span>
							<label>/</label>
							<span class="input-group-addon"><i class="fa fa-female"></i></span>
							<input type="text" class="form-control" placeholder="Enter Gender">
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>Address</label>
							<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
							<input type="text" class="form-control" placeholder="Enter Address">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>City</label>
							<span class="input-group-addon"><i class="fa fa-building"></i></span>
							<input type="text" class="form-control" placeholder="Enter City">
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
						<div class="form-group">
							<label>Account Number</label>
							<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
							<input type="text" class="form-control" placeholder="Enter Account Number">
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label>Appointment Letter</label>
							<input type="text" class="form-control" placeholder="Enter Appointment Letter">
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
            <!-- /.card-body -->
		</div>
    </div>
    <!-- /.container-fluid -->
</section>

@endsection
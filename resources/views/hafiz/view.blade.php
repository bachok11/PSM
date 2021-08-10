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
								<h3 class="card-title">Hafiz</h3>
							</li>
							<li class="nav-item">
								<a href="{!! url('/hafiz/list')!!}" class="nav-link" aria-selected="true">List Hafiz</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link active" aria-selected="false">View Hafiz</a>
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
									<div class="card card-primary">
										<div class="card-body box-profile">
											<div class="text-center">
												<img src="{{ asset("users/{$hafiz_data->image}") }}" width="250px" height="250px" class="img-circle">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Full Name</label>
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" name="firstname" class="form-control" value="{{ $hafiz_data->name.' '.$hafiz_data->lastname }}" disabled />
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Number of Juzuk</label>
												<span class="input-group-addon"></span>
												<input type="int" name="no_juzuk" class="form-control" value="{{ getJuzukFromHafiz($hafiz_data->id_juzuk) }}" disabled />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>IC Number</label>
												<input type="text" name="no_ic" class="form-control" value="{{ $hafiz_data->no_ic }}" disabled />
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Email</label>
												<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
												<input type="email" name="email" class="form-control" value="{{ $hafiz_data->email }}" disabled />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Mobile Number</label>
												<span class="input-group-addon"><i class="fa fa-phone"></i></span>
												<input type="text" name="mobile_no" class="form-control" value="{{ $hafiz_data->mobile_no }}" disabled />

											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Gender</label>
												<span class="input-group-addon"><i class="fa fa-male"></i></span>
												<label>/</label>
												<span class="input-group-addon"><i class="fa fa-female"></i></span>
												<span class="txt_color">
													@if($hafiz_data->gender =='0')
													<input type="text" name="gender" class="form-control" value="Male" disabled />
													@else
													<input type="text" name="gender" class="form-control" value="Female" disabled />
													@endif
												</span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Address</label>
												<span class="input-group-addon"><i class="fa fa-address-book"></i></span>
												<input type="text" name="address" class="form-control" value="{{ $hafiz_data->address }}" disabled />
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Daerah</label>
												<input type="text" name="daerah" class="form-control" value="{{ getDaerahName($hafiz_data->daerahID) }}" disabled />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>Mukim</label>
												<input type="text" name="mukim" class="form-control" value="{{ getMukimName($hafiz_data->mukimID) }}" disabled />
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Account Number</label>
												<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
												<input type="text" name="account_no" class="form-control" value="{{ $hafiz_data->account_no }}" disabled />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
@endsection
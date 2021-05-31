@extends('layouts.main')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-12">
            	<div class="card card-primary card-outline card-outline-tabs col-sm-6">
              		<div class="card-header p-0 pt-1">
						<ul class="nav nav-tabs bar_tabs" role="tablist">
							<li class="pt-2 px-3"><h3 class="card-title">Appointment</h3></li>
							<li class="nav-item">
								<a href="{!! url('/appointment/list')!!}" class="nav-link"  aria-selected="true">List Appointments</a>
							</li>
							<li class="nav-item">
								<a href="{!! url('/appointment/add')!!}" class="nav-link active" aria-selected="false">Add Appointment</a>
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
            	<h3 class="card-title">Edit Appointment Details</h3>
            </div>
			<div class="card-body">
				<form method="POST" action="{!! url('/appointment/edit/update/'.$appointment_data->id) !!}">
				@csrf
                    <div class="row">
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mosque Committee Testee</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="role"  class="form-control select_testee">
                                        <option value="">{{ trans('app.Select Testee')}}</option>
                                        @if(!empty($mosque_data))
                                            @foreach($mosque_data as $key)
                                                <option value="{{ $key->id }}">{{ $key->firstname .' '. $key->lastname }}</option>	
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
						</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Quran Teachers Testee</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="role"  class="form-control select_testee">
                                        <option value="">{{ trans('app.Select Testee')}}</option>
                                        @if(!empty($hafiz_data))
                                            @foreach($hafiz_data as $key)
                                                <option value="{{ $key->id }}">{{ $key->firstname .' '. $key->lastname }}</option>	
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
						</div> -->                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Hafiz Testee</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="hafiz_testee" class="form-control" value="{{ getHafizName($appointment_data->id_reference) }}" placeholder="Enter First Name"/>
                                </div>
                            </div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tester</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="start_time" class="form-control" value="{{ getTesterName($appointment_data->id_tester) }}" placeholder="Enter First Name"/>
                                </div>
                            </div>
						</div>
                    </div>

					<div class="row">
						<div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Time</label>
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="start_time" class="form-control" value="{{ $appointment_data->start_time }}" placeholder="Enter Start"/>
								</div>
                            </div>
						</div>
						<!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Finish Time</label>
                                <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" />
                            </div>
						</div> -->
                        
					</div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type of Test</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input type="text" name="test_type" class="form-control" value="{{ $appointment_data->test_type }}" />
								</div>
                            </div>
						</div>
                    </div>
				  	<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">  
						<div class="col-md-18 col-sm-18 col-xs-18 text-center" >
							<a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('app.Cancel')}}</a>
							<input type="submit" class="btn btn-success"  value="{{ trans('app.Add')}}" />
						</div>
					</div>
                </form>
            </div>
		</div>
    </div>
</section>
@endsection
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
								<a href="{!! url('/appointment/list') !!}" class="nav-link"  aria-selected="true">List Appointments</a>
							</li>
							<li class="nav-item">
								<a href="{!! url('/appointment/add') !!}" class="nav-link active" aria-selected="false">Add Appointment</a>
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
            	<h3 class="card-title">Add Appointment Details</h3>
            </div>
			<div class="card-body">
				<form method="post" action="{!! url('/appointment/store_appointment') !!}">
				@csrf
                    <div class="row">                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Testee</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="volunteer"  class="form-control">
                                        <option value="">{{ trans('app.Select Testee')}}</option>
                                        @if(!empty($volunteers_data))
                                            @foreach($volunteers_data as $key)
                                                <option value="{{ $key->id }}">{{ $key->name .' '. $key->lastname .' ('.$key->role.')' }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('volunteers_data'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('volunteers_data') }}</span>
									   </span>
									@endif
                                </div>
                            </div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Examiner</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="examiner"  class="form-control">
                                        <option value="">{{ trans('app.Select Tester')}}</option>
                                        @if(!empty($examiner_data))
                                            @foreach($examiner_data as $key)
                                                <option value="{{ $key->id }}">{{ $key->name .' '. $key->lastname .' ('.$key->role.')' }}</option>	
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('examiner_data'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('examiner_data') }}</span>
									   </span>
									@endif
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
                                    <input type="date" class="form-control datetime" name="start_time" value="{{ old('start_time') }}" placeholder="Enter Start Time" />
                                    <!-- <input type="datetime-local" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($appointment) ? $appointment->start_time : '') }}" required> -->
                                    @if ($errors->has('start_time'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('start_time') }}</span>
									   </span>
									@endif
								</div>
                            </div>
						</div>                        
					</div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Type of Exam</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="type_exam" id="test" class="form-control select2">
                                        <option value="">{{ 'Select Type of Exam for Testee'}}</option>
                                            @if(!empty($exam_data))
                                                @foreach($exam_data as $key)
                                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                                    @if ($errors->has('exam_data'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('exam_data') }}</span>
									   </span>
									@endif
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
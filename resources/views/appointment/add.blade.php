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
                @if (isset($errors) && count($errors))
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }} </li>
                        @endforeach
                    </ul>
                @endif


				<form method="post" action="{!! url('/appointment/store') !!}">
				@csrf
                    <div class="row">                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Hafiz Testee</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="hafiz_testee"  class="form-control">
                                        <option value="">{{ trans('app.Select Testee')}}</option>
                                        @if(!empty($hafiz_data))
                                            @foreach($hafiz_data as $key)
                                                <option value="{{ $key->id }}">{{ $key->firstname .' '. $key->lastname }}</option>	
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('hafiz_testee'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('hafiz_testee') }}</span>
									   </span>
									@endif
                                </div>
                            </div>
						</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tester</label>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <select name="tester"  class="form-control">
                                        <option value="">{{ trans('app.Select Tester')}}</option>
                                        @if(!empty($tester_data))
                                            @foreach($tester_data as $key)
                                                <option value="{{ $key->id }}">{{ $key->name .' '. $key->lastname }}</option>	
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('tester'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('tester') }}</span>
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
                                    <input type="date" class="form-control datetime" id="start_time" name="start_time" value="{{ old('start_time') }}" placeholder="Enter Start Time" />
                                    @if ($errors->has('start_time'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('start_time') }}</span>
									   </span>
									@endif
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
									<select name="test_type"  class="form-control">
										<option value="">{{ 'Select Type of Test' }}</option>
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
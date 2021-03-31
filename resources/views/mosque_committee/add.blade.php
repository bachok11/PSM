@extends('layouts.main')
@section('content')
<!-- page content -->


<?php $userid = Auth::user()->id;?>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup"> {{ trans('app.Branch')}}</span></a>
						</div>
					</nav>
				</div>
			</div>
        </div>
		<div class="x_content">
            <ul class="nav nav-tabs bar_tabs" role="tablist">
				<li role="presentation" class=""><a href="{!! url('/branch/list')!!}" ><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i> {{ trans('app.Branch List')}}</a></li>
			
				<li role="presentation" class="active"><a href="{!! url('/branch/add')!!}"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i><b>{{ trans('app.Add Branch')}}</b></a></li>
            </ul>
		</div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<div class="x_content">
						@if (session('error'))
							<div class="alert alert-danger"><span class="fa fa-times"></span><em> {{ session('error') }} </em></div>
						@endif
						
						<form method="post" action="{!! url('branch/add') !!}" enctype="multipart/form-data"  class="form-horizontal upperform">
							@csrf
							{{-- <input type="text" name="Company_ID" value="{{ $user_data->company_id }}"> --}}
							<div class="col-md-12 col-xs-12 col-sm-12 space">
								<h4><b>{{ trans('app.Branch Information')}}</b></h4>
								<p class="col-md-12 col-xs-12 col-sm-12 ln_solid"></p>
							</div>
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="Branch_Name">{{ trans('app.Branch Name')}} <label class="text-danger">*</label>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="Branch_Name" name="Branch_Name" class="form-control" placeholder="{{ trans('app.Enter Branch Name') }}"  maxlength="50" value=""/>
									@if ($errors->has('Branch_Name'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('Branch_Name') }}</span>
									   </span>
									@endif
								</div>
							</div>
				
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="starting_year">{{ trans('app.Starting Year')}} </label>
							   	<div class="col-md-6 col-sm-6 col-xs-12 input-group date" id="datepicker1">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									<input type="text" id="starting_year" name="starting_year" class="form-control" id="Country" value=""/>
								</div>
								@if ($errors->has('starting_year'))
									<div class="help-block">
										<span class="text-danger">{{ $errors->first('starting_year') }}</span>
</div>
								@endif
							</div>
												
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="phone_number_branch">{{ trans('app.Phone Number')}} <label class="text-danger">*</label>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="phone_number_branch" name="phone_number_branch" class="form-control" placeholder="{{ trans('app.Enter Phone Number') }}" maxlength="15" value=""/>
									@if ($errors->has('phone_number_branch'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('phone_number_branch') }}</span>
									   </span>
									@endif
								</div>
							</div>
				
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="email_branch">{{ trans('app.Email')}} <label class="text-danger">*</label> 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="email_branch" name="email_branch" class="form-control" placeholder="{{ trans('app.Enter Email Address') }}" value="" maxlength="50"/>
									@if ($errors->has('email_branch'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('email_branch') }}</span>
									   </span>
									@endif
								</div>
							</div>
				
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">{{ trans('app.Address')}} <label class="text-danger">*</label>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="address" id="address" class="form-control" rows="4" placeholder="{{ trans('app.Enter Address') }}" maxlength="100" ></textarea>
									@if ($errors->has('address'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('address') }}</span>
									   </span>
									@endif
								</div>
							</div>
                            
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="country">{{ trans('app.Country')}} <label class="text-danger">*</label>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control  select_country" name="country" id="country" countryurl="{!! url('/getstatefromcountry') !!}">
										<option value="" selected="selected">Select Country</option>
									</select>
								</div>
							</div>
				
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="state">{{ trans('app.State')}} <label class="text-danger">*</label>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control  state_of_country" name="state" id="state" stateurl="{!! url('/getcityfromstate') !!}">
									   <option value="">Select State</option>
									</select>
									@if ($errors->has('state'))
										<span class="help-block">
											<span class="text-danger">{{ $errors->first('state') }}</span>
										</span>
								 	@endif
								</div>
							</div>
				
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="city">{{ trans('app.City')}}</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control  city_of_state" name="city" id="city">
										<option value="">Select City</option>
								  	</select>
								</div>
							</div>
				
				
							<div class="form-group col-md-12 col-sm-12 col-xs-12  has-feedback">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="Paypal_Id">{{ trans('app.Paypal Email Id')}}
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="Paypal_Id" name="Paypal_Id" class="form-control" placeholder="{{ trans('app.Enter Paypal Email Address') }}" maxlength="50" value=""/>
									@if ($errors->has('Paypal_Id'))
									   <span class="help-block">
										   <span class="text-danger">{{ $errors->first('Paypal_Id') }}</span>
									   </span>
									@endif
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">  
								<div class="col-md-9 col-sm-9 col-xs-12 text-center" >
									<a class="btn btn-danger" href="{{ URL::previous() }}">{{ trans('app.Cancel')}}</a>
									<input type="submit" class="btn btn-success"  value="{{ trans('app.Add')}}"/>
									<a class="btn btn-success" href="{!! url('/branch/add/staff')!!}"><b>{{ trans('app.Add Branch')}}</b></a>
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
        </div>
	</div>

<?php
//document.addEventListener("DOMContentLoaded", function(event) { }
// is the javascript pure version of
// $(document).ready(function(){ }
?>

<script>
 document.addEventListener("DOMContentLoaded", function(event) {
	//jQuery(document).ready(function(){
	$('.select_country').on('change',function(){
		countryid = $(this).val();
		var url = $(this).attr('countryurl');
		$.ajax({
			type:'GET',
			url: url,
			data:{ countryid:countryid },
			success:function(response){
				$('.state_of_country').html(response);
			}
		});
	});
	
	$('.state_of_country').on('change', function(){
	//$('body').on('change','.state_of_country',function(){
		var stateid = $(this).val();
		
		var url = $(this).attr('stateurl');
		$.ajax({
			type:'GET',
			url: url,
			data:{ stateid:stateid },
			success:function(response){
				$('.city_of_state').html(response);
			}
		});
	});
});
</script>

<!-- For image preview at selected image -->
<script>
	function readUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
	document.addEventListener("DOMContentLoaded", function(event) { 
	//$(document).ready(function(){
		$("#image").on('change', function(){
			readUrl(this);
			$("#imagePreview").css("display","block");
		});
	});
</script>

<script>
// $(document).ready(function(){   //TODO: make sure guna dalam form
	
	// $('.datepicker1').datetimepicker({ 
    //     format: "<?php //echo getDatepicker(); ?>",
	// 	autoclose: 1,
	// 	minView: 2,
	// 	endDate: new Date(),
    // });
	
	
    
	// 	$(".datepicker,.input-group-addon").click(function(){	
	// 	var dateend = $('#left_date').val('');
		
	// 	});
		
	// 	$(".datepicker").datetimepicker({
	// 		format: "<?php //echo getDatepicker(); ?>",
	// 		 minView: 2,
	// 		autoclose: 1,
	// 	}).on('changeDate', function (selected) {
	// 		var startDate = new Date(selected.date.valueOf());
		
	// 		$('.datepicker2').datetimepicker({
	// 			format: "<?php //echo getDatepicker(); ?>",
	// 			 minView: 2,
	// 			autoclose: 1,
			
	// 		}).datetimepicker('setStartDate', startDate); 
	// 	})
	// 	.on('clearDate', function (selected) {
	// 		 $('.datepicker2').datetimepicker('setStartDate', null);
	// 	})
		
	// 		$('.datepicker2').click(function(){
				
	// 		var date = $('#join_date').val(); 
	// 		if(date == '')
	// 		{
	// 			swal('First Select Join Date');
	// 		}
	// 		else{
	// 			$('.datepicker2').datetimepicker({
	// 			format: "<?php //echo getDatepicker(); ?>",
	// 			 minView: 2,
	// 			autoclose: 1,
	// 			})
				
	// 		}
	// 		});
// });	
	
</script>

@endsection
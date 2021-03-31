@extends('layouts.app')
@section('content')
<!-- page content -->

<?php $userid = Auth::user()->id; ?>

    <div class="right_col" role="main">
        <div class="">
			<div class="page-title">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i><span class="titleup">&nbsp {{ trans('app.Branch')}}</span></a>
						</div>
					</nav>
				</div>
			</div>
        </div>

        <div class="row" >
			<div class="col-md-12 col-sm-12 col-xs-12" >
				<div class="x_content">
					<ul class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="{!! url('/branch/list')!!}"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><b>{{ trans('app.Branch List')}}</b></a></li>
						<li role="presentation" class=""><a href="{!! url('/branch/add')!!}"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i>{{ trans('app.Add Branch') }}</a></li>
					</ul>
				</div>
				<div class="x_panel">
					@if(session('message'))
						<div class="alert alert-success"><span class="fa fa-check"></span><em> {{session('message')}} </em></div>
					@endif

					{{-- <input type="text" name="Company_ID" value="{{ $users->company_id }}"> --}}
					<table id="datatable" class="table table-striped  jambo_table" style="margin-top:20px;" >
						<thead>
						
						
							<tr>
								<th>#</th>
								<th>{{ trans('app.Image')}}</th>
								<th>{{ trans('app.Branch Name')}}</th>
								<th>{{ trans('app.Address')}}</th>
								<th>{{ trans('app.Email')}}</th>
								<th>{{ trans('app.Mobile Number') }}</th>
								<th>{{ trans('app.Action') }}</th>

							</tr>
						
						</thead>
						<tbody>
							<?php $i=1; ?>
							@if(!empty($branch_data))
								@foreach ($branch_data as $key)
								<tr>
									<td>{{ $i }}</td>
									<!-- TODO  validate image-->
									<td><img src="{{ URL::asset('public/general_setting/'.$key->logo_image) }}" class="img-responsive"></td>
									<td>{{ $key->system_name }}</td>
									<td>{{ $key->address }}	</td>
									<td>{{ $key->email }}</td>
									<td>{{ $key->phone_number }}</td>
									<td>
										@if(empty($users))
											<a href="{!! url('/branch/add/staff/'.$key->company_id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('app.Add Staff')}}</button></a>
										@endif
										<a href="{!! url('/branch/view/'.$key->company_id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('app.View')}}</button></a>
										<a href="{!! url('/branch/edit/'.$key->company_id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('app.Edit')}}</button></a>
										<a url="{!! url('/branch/list/delete/'.$key->company_id) !!}" class="sa-warning"><button type="button" class="btn btn-round btn-danger">{{ trans('app.Delete')}}</button></a>
									</td>
								</tr>
								<?php $i++; ?>
								@endforeach
							@endif
						</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	<div class="right_col" role="main">
		<div class="nav_menu main_title" style="margin-top:4px;margin-bottom:15px;">
            <div class="nav toggle" style="padding-bottom:16px;">
               <span class="titleup">&nbsp {{ trans('app.You are not authorize this page.')}}</span>
            </div>
        </div>
	</div> 
 <!-- /page content -->
<script src="{{ URL::asset('vendors/jquery/dist/jquery.min.js') }}"></script>
       
<script>
 $('body').on('click', '.sa-warning', function() {
	
	  var url =$(this).attr('url');
	  
	  
        swal({   
            title: "Are You Sure?",
			text: "You will not be able to recover this data afterwards!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#297FCA",   
            confirmButtonText: "Yes, delete!",   
            closeOnConfirm: false 
        }, function(){
			window.location.href = url;
             
        });
    }); 
 
</script>


{{-- <script>

$(document).on('ready',function(){

		var id = $(this).val();
		$.ajax({
			type:'GET',
			url: "{!! url('/branch/getAdminName') !!}",
			data:{ id : id },
			success:function(response){
				$('.companyID').html(response);
			}
		});
	});
</script> --}}

@endsection
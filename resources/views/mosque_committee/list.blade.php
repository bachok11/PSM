@extends('layouts.main')
@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs col-sm-6">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Mosque Committee</h3></li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">List Mosque Committee</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Add Mosque Committee</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
			  	<div class="card-title">
				  	@if(session('message'))
						<div class="alert alert-success"><span class="fa fa-check"></span><em> {{session('message')}} </em></div>
					@endif
				</div>
			  	<div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                	<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Address</th>
							<th>Mosque</th>
							<th>Mobile Number</th>
							<th>Actions</th>
						</tr>
                  	</thead>
                  	<tbody>
				  		<?php $i=1; ?>
						@if(!empty($users))
							@foreach ($users as $key)
							<tr>
								<td>{{ $i }}</td>
								<td>{{ $key->name }}</td>
								<td>{{ $key->address }}	</td>
								<td>{{ $key->mosque }}</td>
								<td>{{ $key->mobile_no }}</td>
								<td>
									@if(empty($users))
										<a href="{!! url('/branch/add/staff/'.$key->company_id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('app.Add Staff')}}</button></a>
									@endif
									<a href="{!! url('/mosque_committee/view/'.$key->company_id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('app.View')}}</button></a>
									<a href="{!! url('/mosque_committee/edit/'.$key->company_id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('app.Edit')}}</button></a>
									<a url="{!! url('/mosque_committee/list/delete/'.$key->company_id) !!}" class="sa-warning"><button type="button" class="btn btn-round btn-danger">{{ trans('app.Delete')}}</button></a>
								</td>
							</tr>
							<?php $i++; ?>
							@endforeach
						@endif
                  	</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

@endsection
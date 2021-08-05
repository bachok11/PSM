@extends('layouts.main')
@section('content')


<?php $userid = Auth::user()->id; ?>
@if (getActiveAdmin($userid)=='yes')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs col-sm-6">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs bar_tabs" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Hafiz</h3></li>
                  <li class="nav-item">
                    <a href="{!! url('/hafiz/list')!!}" class="nav-link active" data-toggle="pill"  aria-selected="true">List Hafiz</a>
                  </li>
                  <li class="nav-item">
                    <a href="{!! url('/hafiz/add')!!}" class="nav-link" aria-selected="false">Add Hafiz</a>
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
                      <th>Image</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Number of Juzuk</th>
                      <th>Mobile Number</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @if(!empty($hafiz_data))
                      @foreach ($hafiz_data as $key)
                      <tr>
                        <td>{{ $i }}</td>
                        <td><img src="{{ URL::asset('public/hafiz/'.$key->image) }}"  width="50px" height="50px" class="img-circle img-responsive" ></td>
                        <td>{{ $key->name .' '. $key->lastname }}</td>
                        <td>{{ $key->address }}	</td>
                        <td>{{ getJuzukFromHafiz($key->id_juzuk) }}</td>
                        <td>{{ $key->mobile_no }}</td>
                        <td>                                              
                          @can('hafiz_view')
                            <a href="{!! url('/hafiz/view/'.$key->id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('app.View')}}</button></a>
                          @endcan

                          @can('hafiz_edit')
                            <a href="{!! url('/hafiz/edit/'.$key->id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('app.Edit')}}</button></a>
                          @endcan

                          @can('hafiz_delete')
                            <a href="{!! url('/hafiz/list/delete/'.$key->id) !!}" class="sa-warning"><button type="button" class="btn btn-round btn-danger">{{ trans('app.Delete')}}</button></a>
                          @endcan
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
      </div>
</section>
@else
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>404 Error Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">404 Error Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
          </p>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
@endif

<script>
document.addEventListener("DOMContentLoaded", function(event) {
$('.btn-danger').on('click', '.sa-warning', function() {
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
});
</script>
@endsection
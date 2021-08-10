@extends('layouts.main')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-outline-tabs col-sm-6">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs bar_tabs" role="tablist">
                        <li class="pt-2 px-3"><h3 class="card-title">Quran Teachers</h3></li>
                        <li class="nav-item">
                            <a href="{!! url('/quran_teacher/list')!!}" class="nav-link active" data-toggle="pill" aria-selected="true">List Quran Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{!! url('/quran_teacher/add')!!}" class="nav-link" aria-selected="false">Add Quran Teacher</a>
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            @if(session('message'))
                                <div class="alert alert-success"><span class="fa fa-check"></span><em> {{ session('message') }} </em></div>
                            @endif
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
                            <th>School</th>
                            <th>Mobile Number</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @if(!empty($quranTeacher_data))
                                @foreach ($quranTeacher_data as $key)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img src="{{ asset("users/{$key->image}") }}"  width="50px" height="50px" class="img-circle" ></td>
                                    <td>{{ $key->name.' '.$key->lastname }}</td>
                                    <td>{{ $key->address }}	</td>
                                    <td>{{ $key->school_name }}</td>
                                    <td>{{ $key->mobile_no }}</td>
                                    <td>
                                        <a href="{!! url('/quran_teacher/view/'.$key->id) !!}"><button type="button" class="btn btn-round btn-info">{{ trans('app.View')}}</button></a>
                                        <a href="{!! url('/quran_teacher/edit/'.$key->id) !!}" ><button type="button" class="btn btn-round btn-success">{{ trans('app.Edit')}}</button></a>
                                        <a onclick="return confirm('Are you sure?')" href="{!! url('/quran_teacher/list/delete/'.$key->id) !!}" class="sa-warning"><button type="button" class="btn btn-round btn-danger">{{ trans('app.Delete')}}</button></a>
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
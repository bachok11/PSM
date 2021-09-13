@extends('layouts.main')
@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline card-outline-tabs col-sm-6">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs bar_tabs" role="tablist">
              <li class="pt-2 px-3">
                <h3 class="card-title">Appointments</h3>
              </li>
              <li class="nav-item">
                <a href="{!! url('/appointment/list') !!}" class="nav-link active" data-toggle="pill" aria-selected="true">List Appointments</a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/appointment/add') !!}" class="nav-link" aria-selected="false">Add Appointments</a>
              </li>
              @if (getUsersRole(Auth::user()->role_id) == 'Super Admin' || getUsersRole(Auth::user()->role_id) == 'Admin' || getUsersRole(Auth::user()->role_id) == 'Staff HQ' || getUsersRole(Auth::user()->role_id) == 'Staff PKD')
              <li class="nav-item">
                <a href="{!! url('/appointment/list_failed') !!}" class="nav-link" aria-selected="false">Failed Tests</a>
              </li>
              @endif
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
          </div>
          <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Role</th>
                  <th>Name</th>
                  <th>Start Time (Y-M-D / H-M-S)</th>
                  <th>Examiner</th>
                  <th>Type of Test</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @if(!empty($appointment_data))
                @foreach ($appointment_data as $key)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ getUsersRole_User($key->id_reference) }}</td>
                  <td>{{ getName($key->id) }}</td>
                  <td>{{ $key->start_time }} </td>
                  <td>{{ getExaminerName($key->id_tester) }} </td>
                  <td>{{ getTypeExam($key->test_type) }}</td>
                  <td>
                    <?php
                    if ($key->pass_test == 0) { ?>
                      @can('appointment_pass_test')
                      <a onclick="return confirm('Are you sure?')" href="{!! url('/appointment/list/approve_test/'.$key->id) !!}"><button type="button" class="btn btn-round btn-primary">{{ __('Pass Test') }}</button></a>
                      @endcan
                    <?php } ?>

                    <?php
                    if ($key->pass_test == 0) { ?>
                      @can('appointment_pass_test')
                      <a href="{!! url('/appointment/edit_failed/'.$key->id) !!}"><button type="button" class="btn btn-round btn-warning">{{ __('Fail Test') }}</button></a>
                      @endcan
                    <?php } ?>

                    @can('appointment_view')
                    <a href="{!! url('/appointment/view/'.$key->id) !!}"><button type="button" class="btn btn-round btn-info">{{ __('View') }}</button></a>
                    @endcan

                    @can('appointment_edit')
                    <a href="{!! url('/appointment/edit/'.$key->id) !!}"><button type="button" class="btn btn-round btn-success">{{ __('Edit') }}</button></a>
                    @endcan

                    @can('appointment_delete')
                    <a onclick="return confirm('Are you sure?')" href="{!! url('/appointment/list/delete/'.$key->id) !!}"><button type="button" class="btn btn-round btn-danger">{{ __('Delete') }}</button></a>
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

<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    $('.btn-danger').on('click', '.sa-warning', function() {
      var url = $(this).attr('href');
      swal({
        title: "Are You Sure?",
        text: "You will not be able to recover this data afterwards!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#297FCA",
        confirmButtonText: "Yes, delete!",
        closeOnConfirm: false
      }, function() {
        window.location.href = url;
      });
    });
  });
</script>
@endsection
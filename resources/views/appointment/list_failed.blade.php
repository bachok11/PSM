@extends('layouts.main')
@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary card-outline card-outline-tabs col-sm-6">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs bar_tabs" role="tablist">
                  <li class="pt-2 px-3"><h3 class="card-title">Appointments</h3></li>
                  <li class="nav-item">
                    <a href="{!! url('/appointment/list') !!}" class="nav-link" aria-selected="false">List Appointments</a>
                  </li>
                  <li class="nav-item">
                    <a href="{!! url('/appointment/add') !!}" class="nav-link" aria-selected="false">Add Appointments</a>
                  </li>
                  <li class="nav-item">
                    <a href="{!! url('/appointment/add') !!}" class="nav-link active" data-toggle="pill" aria-selected="true">Failed Appointments</a>
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
                      <th>Role</th>
                      <th>Name</th>
                      <th>Start Time (Y-M-D / H-M-S)</th>
                      <th>Start Time (Y-M-D / H-M-S)</th>
                      <th>Examiner</th>
                      <th>Type of Test</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>
                    @if(!empty($appointment_data))
                      @foreach ($appointment_data as $key)
                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ getUsersRole_User($key->id_reference) }}</td>
                        <td>{{ getName($key->id) }}</td>
                        <td>{{ $key->start_time }}	</td>
                        <td>{{ $key->finish_time }}	</td>
                        <td>{{ getExaminerName($key->id_tester) }}	</td>
                        <td>{{ getTypeExam($key->test_type) }}</td>
                        <td>{{ $key->comment }}</td>
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
</script>
@endsection
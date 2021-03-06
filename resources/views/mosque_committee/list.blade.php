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
                <h3 class="card-title">Mosque Committee</h3>
              </li>
              <li class="nav-item">
                <a href="{!! url('/mosque_committee/list')!!}" class="nav-link active" data-toggle="pill" aria-selected="true">List Mosque Committee</a>
              </li>
              <li class="nav-item">
                <a href="{!! url('/mosque_committee/add')!!}" class="nav-link" aria-selected="false">Add Mosque Committee</a>
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
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Mosque</th>
                  <th>Mobile Number</th>
                  <th>Role</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @if(!empty($mosque_data))
                @foreach ($mosque_data as $key)
                <tr>
                  <td>{{ $i }}</td>
									<!-- <td><img src="/public/users/{{ $key->image }}"  width="50px" height="50px" class="img-circle" ></td> -->
									<td><img src="{{ asset("users/{$key->image}") }}"  width="50px" height="50px" class="img-circle" ></td>
                  <td>{{ $key->name.' '.$key->lastname }}</td>
                  <td>{{ $key->address }} </td>
                  <td>{{ getMosqueName($key->mosqueID) }}</td>
                  <td>{{ $key->mobile_no }}</td>
                  <td>{{ getUsersRole($key->role_id) }}</td>
                  <td>
                    @can('mosque_committee_view')
                    <a href="{!! url('/mosque_committee/view/'.$key->id) !!}"><button type="button" class="btn btn-round btn-info">{{ __('View') }}</button></a>
                    @endcan

                    @can('mosque_committee_edit')
                    <a href="{!! url('/mosque_committee/edit/'.$key->id) !!}"><button type="button" class="btn btn-round btn-success">{{ __('Edit') }}</button></a>
                    @endcan

                    @can('mosque_committee_delete')
                    <a onclick="return confirm('Are you sure?')" href="{!! url('/mosque_committee/list/delete/'.$key->id) !!}" class="sa-warning"><button type="button" class="btn btn-round btn-danger">{{ __('Delete') }}</button></a>
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
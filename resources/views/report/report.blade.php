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
                <h3 class="card-title">Mosque Report</h3>
              </li>
              <li class="nav-item">
                <a href="{!! url('/mosque_committee/list')!!}" class="nav-link active" data-toggle="pill" aria-selected="true">List Mosque Report</a>
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
              <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <br>
                <a class="btn btn-warning" href="{{ route('export_mosque_report') }}">Export Mosque Data</a>
              </form>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Mosque Name</th>
                  <th>Income (This Month)</th>
                  <th>Expense (This Month)</th>
                  <th>Account Number</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @if(!empty($mosque_data))
                @foreach ($mosque_data as $key)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $key->mosque_name }}</td>
                  <td>{{ $key->income }} </td>
                  <td>{{ $key->expense }}</td>
                  <td>{{ $key->account_no }}</td>
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
@endsection
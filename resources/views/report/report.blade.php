@extends('layouts.main')
@section('content')

<div class="card-header">
  <h3 class="card-title">
    <i class="fas fa-chart-pie mr-1"></i>
    Report
  </h3>
    <div class="card-tools">
      <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import User Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
      </form>
    </div>
</div>
@endsection
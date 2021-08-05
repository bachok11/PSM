@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ getMosqueCommitteeQuantity() }}</h3>
            <p>Mosque Committee</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ url('/mosque_committee/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ getQuranTeachersQuantity() }}</h3>
            <p>Quran Teachers</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ url('/quran_teacher/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ getHafizQuantity() }}</h3>
            <p>Hafiz</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ url('/hafiz/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ getAppointmentsQuantity() }}</h3>
            <p>Appointment</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ url('/appointment/list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-7 connectedSortable">
        <!-- TO DO List -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="ion ion-clipboard mr-1"></i>
              Recently Joined User
            </h3>

            <div class="card-tools">
              <ul class="pagination pagination-sm">
                <li><a href="{!! url('/mosque_committee/list')!!}"><button type="button" class="btn btn-default">{{ 'View All' }}</button></a>
              </ul>
            </div>
          </div>
          <div class="card-body">
              <ul class="todo-list" data-widget="todo-list">
                @if (!empty($recent_user))
                @foreach($recent_user as $key)
                <li class="media event">
                  <a class="userpic">
                    <img src="{{ asset("users/{$key->image}") }}" width="50px" height="50px" class="img-circle">
                  </a>
                  <div class="media-body">
                    <a class="title" href="/mosque_committee/list"><strong>{{ $key->name}}&nbsp;{{ $key->lastname }}</a> </strong>
                    <p> {{ $key->email }} </p>
                    </p>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>

              
          </div>
      </section>

    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
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
					<ul class="nav nav-tabs bar_tabs" role="tablist">
						<li role="presentation" class="active"><a href="{!! url('/branch/list')!!}"><span class="visible-xs"></span><i class="fa fa-list fa-lg">&nbsp;</i><b>{{ trans('app.Branch List')}}</b></a></li>
						<li role="presentation" class=""><a href="{!! url('/branch/add')!!}"><span class="visible-xs"></span><i class="fa fa-plus-circle fa-lg">&nbsp;</i>{{ trans('app.Add Branch') }}</a></li>
					</ul>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
					<tr>
						<td>Trident</td>
						<td>Internet
						Explorer 4.0
						</td>
						<td>Win 95+</td>
						<td> 4</td>
						<td>X</td>
					</tr>
					<tr>
						<td>Trident</td>
						<td>Internet
						Explorer 5.0
						</td>
						<td>Win 95+</td>
						<td>5</td>
						<td>C</td>
					</tr>
					<tr>
						<td>Trident</td>
						<td>Internet
						Explorer 5.5
						</td>
						<td>Win 95+</td>
						<td>5.5</td>
						<td>A</td>
					</tr>
					<tr>
						<td>Trident</td>
						<td>Internet
						Explorer 6
						</td>
						<td>Win 98+</td>
						<td>6</td>
						<td>A</td>
					</tr>
					<tr>
						<td>Trident</td>
						<td>Internet Explorer 7</td>
						<td>Win XP SP2+</td>
						<td>7</td>
						<td>A</td>
					</tr>
					<tr>
						<td>Trident</td>
						<td>AOL browser (AOL desktop)</td>
						<td>Win XP</td>
						<td>6</td>
						<td>A</td>
					</tr>
					<tr>
						<td>Gecko</td>
						<td>Firefox 1.0</td>
						<td>Win 98+ / OSX.2+</td>
						<td>1.7</td>
						<td>A</td>
					</tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
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
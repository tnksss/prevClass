@extends('manager.layout.app')

@section('content_header')
    <h1>Ano Letivo</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('manager.home') }}">Dashboard</a></li>
        <li>Ano Letivo</a></li>
    </ol>
    <br>	
@stop


@section('content')
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('school-year.create',['$id'=>$unity->id]) }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> <strong>Incluir Ano Letivo</strong></a>       
              
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input name="table_search" class="form-control pull-right" placeholder="Procurar" type="text">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Ano</th>
                  <th>Status</th>
                </tr>
                
                @foreach($unity->schoolYears as $schoolYear)
                  <tr>
                      <td>{{ $schoolYear->year }}</td>
                      <td>{{ $schoolYear->status }}</td>
                  </tr>
                @endforeach    


              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@stop
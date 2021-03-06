@extends('manager.layout.app')
@section('title','| Turmas')
@section('content_header')
<h1>Turmas</h1>
@include('layouts.notifications')
<ol class="breadcrumb">
    <li><a href="{{ route('manager.home') }}">Dashboard</a></li>
    <li>Turmas</a></li>
    
</ol>
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">    
                <a href="{{ route('grades.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> <strong>Cadastrar Turma</strong></a>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width:150px;">
                        <input name="table_search" class="form-control pull-right" placeholder="Procurar" type="text">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
 
            </div>
            <div class="box-body">
                @foreach($courses as $course)
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><strong>{{$course->name}}</strong></h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <th>Seriação</th>
                                    <th>Turno</th>
                                    <th>Turma</th>
                                    <th class="pull-right">Ações</th>
                                </tr>
                                @foreach($course->grades()->orderBy('name')
                                ->orderBy('degree')
                                ->orderBy('shift')
                                ->orderBy('order')->get() as $grade)
                                
                                <tr>
                                    <td>{{ $grade->name }}</td>
                                    <td>{{ $grade->degree }}</td>
                                    <td>{{ $grade->shift($grade->shift) }}</td>
                                    <td>{{ $grade->order }}</td>
                                    <td class="pull-right">
                                        @include('manager.partials.grade_buttons')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.box-header -->   
    </div>
</div>
</div>
@stop
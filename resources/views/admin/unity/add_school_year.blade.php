@extends('admin.layout.app')

@section('content_header')
    <h1>Inclusão de Ano Letivo</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
        <li><a href="{{ route('unities.index') }}">Unidades</a></li>
        <li>Nova</a></li>
	</ol>
	<br>	
@stop

@section('content')
<div class=" container-fluid col-md-12 ">
<div class="box box-info ">
    <div class="box-header with-border">
        <h3 class="box-title">Municipio e Escola</h3>
    </div>
    <div class="box-body">
                <div class="form-group">
				    <h3> {{$unity->name}} </h3>				    
				</div>
                {!! Form::open(['route' => 'schoolYear.store']) !!}
				
				<input id="unity_id" name="unity_id" value="{{$unity->id}}" >
				
				<div class="form-group">
				    <label for="year"> Ano </label>
				    <input  id="year" name="year" class="form-control" autofocus>
				</div>
                
                <div class="form-group">
				    <label for="status"> Status </label>
				    <input  id="status" name="status" class="form-control">
				</div>
            	<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Salvar">

					{!! Form::close() !!} 
					<a href="{{ route('unities.index' )}}"class="btn btn-danger">Voltar</a>
				</div>
                
                
			</fieldset>
				
		    
    </div>
</div>
</div>
@stop


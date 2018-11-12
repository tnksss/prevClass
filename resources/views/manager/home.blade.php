    @extends('manager.layout.app')
    @section('content_header')
    <h1>{{$manager->unity->name}}</h1>
    @stop
    @section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                            
                            <div class="info-box-content">
                                <span class="info-box-text">Turmas</span>
                                <span class="info-box-number">10</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-child"></i></span>          
                            <div class="info-box-content">
                                <span class="info-box-text">Alunos Matrículados</span>
                                <span class="info-box-number">41,410</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    
                    <!-- fix for small devices only -->
                    <div class="clearfix visible-sm-block"></div>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green"><i class="fa fa-graduation-cap"></i></span>
                            
                            <div class="info-box-content">
                                <span class="info-box-text">Professores Supridos</span>
                                <span class="info-box-number">760</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow"><i class="fa fa-commenting-o"></i></span>
                            
                            <div class="info-box-content">
                                <span class="info-box-text">Conceitos</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>

    @endsection
@if( $errors->any())
    <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    @foreach( $errors->all() as $error )
        <li>{{$error}}</li>
    @endforeach
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{session('success')}}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{session('error')}}
    </div>
@endif
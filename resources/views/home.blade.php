@extends('layouts.app')

@section('content')
<div class="col-md-2">
    <!--nav-->
                @include('layouts.dashboard')
            <!--end nav-->
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
           <center> <img src="assets/p.jpg" width="400" height="300">
                <div class="panel-heading"><h4><font color="blue">Selamat datang di website saya</font></h4></div></center>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h4><font color="blue">Website ini adalah tugas crud berelasi one to one dan one to many di laravel</font></h4>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

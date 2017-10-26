@extends('layouts.app')

@section('content')
  <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

  <!-- Jumbotron -->
      <div class="well well-lg">
        <h1>{{ $user->id }}</h1>
        
        <!--<p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>-->
      </div>
     </div>
    @endsection

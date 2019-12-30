@extends('layouts.app')



@section('content')

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('companies') }}">Company Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('companies') }}">View All Companies</a></li>
        <li><a href="{{ URL::to('companies/create') }}">Create a Company</a></li>
        <li><a href="{{ URL::to(app()->getLocale(),'home') }}">Back To Dashboard</a></li>
    </ul>
</nav>

<h1>Showing {{ $company->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $company->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $company->email }}<br>
            <strong>Logo:</strong> <img  height="60px" src="{{asset('/storage/logo/'.$company->logo)}}" alt="">
        </p>
    </div>

</div>

@endsection
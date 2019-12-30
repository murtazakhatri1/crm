@extends('layouts.app')



@section('content')

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('employees') }}">Employee Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('employees') }}">View All Employees</a></li>
        <li><a href="{{ URL::to('employees/create') }}">Create a Employee</a></li>
         <li><a href="{{ URL::to(app()->getLocale(),'home') }}">Back To Dashboard</a></li>

    </ul>
</nav>

<h1>Showing {{ $employee->first_name }} {{ $employee->last_name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $employee->first_name }} {{ $employee->last_name }}</h2>
        <p>
            <strong>Email:</strong> {{ $employee->email }}<br>
            <strong>Phone:</strong>  {{ $employee->phone }}
        </p>
    </div>

</div>

@endsection
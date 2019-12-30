@extends('layouts.app')

@section('content')
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('employees') }}">Employees Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('employees') }}">View All Employees</a></li>
        <li><a href="{{ URL::to('employees/create') }}">Create a Employees</a>
         <li><a href="{{ URL::to(app()->getLocale(),'home') }}">Back To Dashboard</a></li>
    </ul>
</nav>

<h1>All the Employees</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Company Name</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($all_employees as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->FindCompany->name??"NA"}}</td>
            <td>{{ $value->first_name }}</td>
            <td>{{ $value->last_name }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->phone }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('employees/' . $value->id) }}">Show this Employee</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('employees/' . $value->id . '/edit') }}">Edit this Employee</a>

                 <br><br>
                <form action="{{ action('EmployeeController@destroy',$value->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-small btn-danger" type="submit">Delete this Employee</button>   
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="text-right">
    {{ $all_employees->links() }}
</div>
</div>
@endsection

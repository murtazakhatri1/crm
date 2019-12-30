@extends('layouts.app')

@section('content')
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('companies') }}">Companies Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('companies') }}">View All Companies</a></li>
        <li><a href="{{ URL::to('companies/create') }}">Create a Companies</a>
        <li><a href="{{ URL::to(app()->getLocale(),'home') }}">Back To Dashboard</a></li>
    </ul>
</nav>

<h1>All the Companies</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Logo</td>
            <td>Name</td>
            <td>Email</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($all_companies as $key => $value)
        <tr>
             <td>{{ $value->id }}</td>
            <td><img  height="60px" src="{{asset('/storage/logo/'.$value->logo)}}" alt=""> </td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('companies/' . $value->id) }}">Show this Company</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('companies/' . $value->id . '/edit') }}">Edit this Company</a>   
                <br><br>
                <form action="{{ action('CompanyController@destroy',$value->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-small btn-danger" type="submit">Delete this Company</button>   
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="text-right">
    {{ $all_companies->links() }}
</div>
</div>
@endsection

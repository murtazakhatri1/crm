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

<h1>Edit {{ $company->name }}</h1>
<form method="post" action="{{ action('CompanyController@update',$company->id) }}" enctype="multipart/form-data">
@csrf




<div class="row">
<div class="col-sm-4 form-group">
 <label>Logo <span style="color: red">*</span></label>
 <input type="file" class="form-control" name="logo"  value="">
 <b style="color: red">{{ $errors->first('logo') }}</b>
 <br>
  @if(isset($company->logo))
  <img width="70px" src="{{asset('storage/logo/'.$company->logo)}}" alt="{{$company->logo}}" >
  @endif
</div>




<div class="col-sm-6 form-group">
 <label>Name <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="name" value="{{$company->name}}">
 <b style="color: red">{{ $errors->first('name') }}</b>
</div>

</div> 

<div class="row">
<div class="col-sm-6 form-group">
 <label>Email <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="email"  value="{{$company->email}}" placeholder="abc@gmail.com">
  <b style="color: red">{{ $errors->first('email') }}</b>
</div>
</div> 

<div class="row">
    <div class="col-sm-6">
        {{ method_field('PUT')}}
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</div>
</form>
</div>
@endsection



@extends('layouts.app')


<script type="text/javascript">

</script>
@section('content')

<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('employees') }}">Employee Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{  URL::to('employees') }}">View All Employees</a></li>
        <li><a href="{{  URL::to('employees/create') }}">Create a Employee</a></li>
         <li><a href="{{ URL::to(app()->getLocale(),'home') }}">Back To Dashboard</a></li>
    </ul>
</nav>

<h1>Create a Employee</h1>
<form method="post" action="{{  URL::to('employees') }}">
@csrf
<div class="row">
<div class="col-sm-6 form-group">
 <label>Company <span style="color: red">*</span></label>
<select class="form-control company" name="company_id"> 
    <option value="" disabled="true" selected="">Please Select Company</option>
   @foreach($all_companies as $key => $value)
    <option value="{{$value->id}}" {{ old('company_id') == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
   @endforeach 
</select>
 <b style="color: red">{{ $errors->first('company_id') }}</b>

</div>

<div class="col-sm-6 form-group">
 <label>First Name <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="first_name"  value="{{old('first_name')}}">
  <b style="color: red">{{ $errors->first('first_name') }}</b>

</div>
</div>  

<div class="row">
<div class="col-sm-6 form-group">
 <label>Last Name <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="last_name"  value="{{old('last_name')}}">
   <b style="color: red">{{ $errors->first('last_name') }}</b>

</div>
<div class="col-sm-6 form-group">
 <label>Email <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="abc@gmail.com">
    <b style="color: red">{{ $errors->first('email') }}</b>

</div>

</div> 

<div class="row">
<div class="col-sm-6 form-group">
 <label>Phone <span style="color: red">*</span></label>
 <input type="text" class="form-control" name="phone" maxlength="12" placeholder="03xx-xxxxxxx" value="{{old('phone')}}">
     <b style="color: red">{{ $errors->first('phone') }}</b>

</div>
</div> 

<div class="row">
    <div class="col-sm-6">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>

</form>
</div>
@endsection



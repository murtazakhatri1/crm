@extends('layouts.app')
<style type="text/css">
.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-4">
                          <div class="card-counter primary">
                            <i class="fa fa-building"></i>
                            <span class="count-numbers">{{$allcompanies}}</span>
                            <span class="count-name">Companies</span>
                          </div>
                           <a href="{{ URL::to('companies') }}">
                            <div class="panel-footer" style="border: 2px solid blue; color: blue; padding: 5px;">
                                <span class="pull-center">View Comapnies</span>
                            </div>
                           </a>
                        </div>


                       <div class="col-md-4"></div>
                        <div class="col-md-4">
                          <div class="card-counter danger">
                            <i class="fa fa-user"></i>
                            <span class="count-numbers">{{$allemployees}}</span>
                            <span class="count-name">Employees</span>
                         </div>
                          <a href="{{ URL::to('employees') }}">
                            <div class="panel-footer" style="border: 2px solid red; color: red; padding: 5px;">
                                <span class="pull-center">View Employees</span>
                            </div>
                           </a>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

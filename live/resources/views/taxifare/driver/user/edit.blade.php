@extends('taxifare.admin.main')
@section('title','Edit Client - Admin Panel | Taxi Fare Finder')
@section('content')
  <section class="content-header">
      <h1>Client List</h1>
      @include('taxifare.flash.message')
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-xs-12">
              @include('taxifare.flash.message')
              <div class="box">
                  <div class="box-body">
                    {{Form::open(['method'=>'POST','url'=>'driver/user/update/'.$driver->id,'class'=>'form-horizontal','files'=>true])}}
                      @include('taxifare.driver.user.form')
                    {{Form::close()}}
                  </div>
              </div>
          </div>
      </div>
  </section>

@stop

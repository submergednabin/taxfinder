@extends('taxifare.admin.main')
@section('title','Compose New Email - Admin Panel | Taxi Fare Finder')
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
                        {{Form::open(['method'=>'POST','url'=>'admin/send-mail-to-driver','class'=>'form-horizontal','files'=>true])}}
                            <div class="form-group">
                                <label class="col-sm-2">To<span style="color: red;">&nbsp;*</span></label>
                                <div class="col-sm-6">
                                {{Form::email('email_receiver',null,['class'=>'form-control',])}}
                                @if ($errors->has('email_receiver'))
                                    <div class="col-md-12 col-md-offset-3">
                                        <span class="help-block">
                                          {{ $errors->first('email_receiver') }}
                                        </span>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">From<span style="color: red;">&nbsp;*</span></label>
                                <div class="col-sm-6">
                                {{Form::email('email_sender',null,['class'=>'form-control',])}}
                                @if ($errors->has('email_sender'))
                                    <div class="col-md-12 col-md-offset-3">
                                        <span class="help-block">
                                          {{ $errors->first('email_sender') }}
                                        </span>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Subject</label>
                                <div class="col-sm-6">
                                {{Form::text('subject',null,['class'=>'form-control',])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Booked By<span style="color: red;">&nbsp;*</span></label>
                                <div class="col-sm-6">
                                {{Form::select('booked_by',$user,null,['class'=>'form-control',])}}
                                @if ($errors->has('booked_by'))
                                    <div class="col-md-12 col-md-offset-3">
                                        <span class="help-block">
                                          {{ $errors->first('booked_by') }}
                                        </span>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2">Message<span style="color: red;">&nbsp;*</span></label>
                                <div class="col-sm-6">
                                {{Form::textarea('message',null,['class'=>'form-control',])}}
                                @if ($errors->has('message'))
                                    <div class="col-md-12 col-md-offset-3">
                                        <span class="help-block">
                                          {{ $errors->first('message') }}
                                        </span>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 text-right">
                                    <button class="btn btn-primary">Send Mail</button>
                                </div>
                            </div>
                                
                            </div>


                        {{Form::close()}}
                    </div>
            </div>
        </div>
    </section>

@stop

@extends('layouts.master')
@section('content')
    @if(! Auth::check())
    <div class="container-fluid" style="border: hidden;">
        <div class="row">

            <div class="col-md-4">

                    <img src="{{url('images/social-networking.jpg')}}" width="700" height="555" style="margin-top: 11px">

            </div>

            <div class="col-md-4">
                @include('layouts.errors')
            </div>

            <div class="col-md-4">
                <div style="margin-top: 11px; width:345px;">


                        <h3>Register</h3>
                        {{--{!! Form::type('name','value',['class'=>'classname1 classname2','placeholder'=>'placeholdername']) !!}--}}

                        {!! Form::open(['url'=>'/register', 'method'=>'post']) !!}

                        {{csrf_field()}}

                        <div class="form-group">
                            {!! Form::text('firstname',null,['class'=>'form-control','placeholder'=>'First Name','required'=>'']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Last Name','required'=>'']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email','required'=>'']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password','required'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm Password','required'=>'']) !!}
                        </div>

                        <div class="form-group">
                            <button type="submit">Register</button>
                        </div>

                        {!! Form::close() !!}

                </div>
            </div>



        </div>
    </div>
    @endif
@endsection
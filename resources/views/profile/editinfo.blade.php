@extends('layouts.master')
@section('content')
    @if(Auth::check())
        <div class="container" style="margin-top: 11px;">

            {!! Form::open(['url'=>('/updateInfo'), 'method'=>'post']) !!}

            {{csrf_field()}}
            <div class="form-group" style="width: 222px;">
                {!! Form::text('country',$user->profile->country,['class'=>'form-control']) !!}
            </div>
            <div class="form-group" style="width: 222px;">
                {!! Form::text('city',$user->profile->city,['class'=>'form-control']) !!}
            </div>
            <div class="form-group" style="width: 222px;">
                {!! Form::text('profession',$user->profile->profession,['class'=>'form-control']) !!}
            </div>
            {!! Form::submit('Update',['class'=>'btn btn-default'])  !!}
        </div>
        {!! Form::close() !!}
        </div>
    @endif
@endsection
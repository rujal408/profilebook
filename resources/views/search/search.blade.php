@extends('layouts.master')
@section('content')
    <div class="container">
        Your search for "{{Request::input('search')}}"

        <div class="row">
            <div class="col-md-4">
                @foreach($users as $user)
                    <li><img src='{{url('images/'.$user->avatar)}}' style="width:32px; height:33px; border-radius: 10%;"> <a href="{{url('/'.$user->id)}}">{{$user->getName()}}</a></li>
                @endforeach
            </div>

            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection
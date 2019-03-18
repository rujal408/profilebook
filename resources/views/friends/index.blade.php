@extends('layouts.master')
@section('content')
    @if(auth()->user())
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Friend Lists</h3>
            @if(! $friends->count())
                <p>You have no friends.</p>
                @else
            @foreach($friends as $user)
                <li style="list-style: none;"><img src="{{url('images/'.$user->avatar)}}" height="33" width="33" style="border-radius: 10%;">
                    <a href="{{url('/'.$user->id)}}">{{$user->getNameOrEmail()}}</a></li>
                @endforeach
                @endif
        </div>
        <div class="col-md-4">
            <h3>Friend Request</h3>
            @if(! $requests->count())
                <p>You have no friend request.</p>
            @else
                <p>You have request from:</p>
                @foreach($requests as $request)
                    <p><li style="list-style: none;"><a href="{{url('/'.$request->id)}}"> <img src="{{url('images/'.$request->avatar)}}" height="33" width="33" style="border-radius: 10%;">{{$request->getName()}}</a></li></p>
                @endforeach
            @endif
        </div>
    </div>
</div>
    @endif
@endsection
@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-3">

         <div class="card" style="margin-top: 11px;">
            <div class="card-header">
             <img src="{{url('images/'.$user->avatar)}}" style="width:265px; height:222px; border-radius: 4%;" class="img-thumbnail">

        </div>

            <div class=" card-block">
               <div class="card card-text">
                <i class="fa fa-flag"></i>{{$user->profile->country}}
            </div>
             <div class="card card-text">
                <i class="fa fa-home" aria-hidden="true"></i>
           {{$user->profile->city}}
            </div>
                <div class=" card card-text"><i class="fa fa-graduation-cap"></i>
            {{$user->profile->profession}}
                </div>

        </div>

    </div>
    <div>
        @if(auth()->user()->hasFriendRequestPending($user))
            <p>Waiting for {{$user->getName()}} to accept your request.</p>

        @elseif(auth()->user()->hasFriendRequestReceived($user))
            <a href="{{route('friend.accept',['id'=>$user->id])}}" class="btn btn-primary">Accept Request</a>
            <a href="{{route('friend.reject',['id'=>$user->id])}}" class="btn btn-primary">Reject Request</a>

        @elseif((auth()->user()->isFriendsWith($user)))
            <p>You and {{$user->getName()}} are friends.</p>
            <p><a href="{{route('friend.remove',['id'=>$user->id])}}">Unfriend</a> </p>

        @elseif(auth()->user()->id ==$user->id)

        @else
            <a href="{{route('friend.add',['id'=>$user->id])}}" class="btn btn-primary">Add as friend</a>

        @endif
    </div>
</div>
     <div class="col-md-5">
    @if(auth()->user()->id == $user->id)
         <div class="postStatus">

    <h2>Post Status</h2>

    {!! Form::open(['url'=>'/status','method'=>'post']) !!}
      <div class="form-group">
        {!! Form::text('status',null,['class'=>'form-control','placeholder'=>'Write Something...','required'=>'']) !!}
    </div>
         <div class="form-group">
        <button type="submit" style="display: none;">POST</button>
    </div>
    {!! Form::close()  !!}
    </div>
    @endif

<div style="margin-top: 10px;">

    @include('posts.index')

</div>
</div>

        <div class="col-md-4">
    <div>
        <h4 align="center">Google Map</h4>
    </div>
            <div id="map">

            </div>

    </div>
</div>


    @endsection
<section class="header">

<div class="head">
    <div class="container">
        <div class="row" style="height: 55px">
            @if(Auth::check())
            <a href={{url('/'.auth()->user()->id)}}> <h1 class="head">ProfileBook</h1></a>
                @else
                <a href={{url('/')}}> <h1 class="head">ProfileBook</h1></a>
@endif
            @if(Auth::check())
                <ul class="list">
                    <li>
                        {!! Form::open(['url'=>'/search','role'=>'search','method'=>'post']) !!}
                        {{csrf_field()}}
                        {!! Form::text('search',null,['class'=>'form-control','placeholder'=>'Name or Email']) !!}</li>
                    <li style="margin-right: 300px;">{!! Form::submit('Search',['class'=>'btn btn-default']) !!}</li>
                    {!! Form::close() !!}


                    <li>
                        <div class="dropdown">

                            <button class="btn btn-secondary dropdown-toggle header-button" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{url('images/'.auth()->user()->avatar)}}" style="width:32px; height:33px; border-radius: 10%;"> {{auth()->user()->getName()}}<span class="caret"></span>
                                    [{{auth()->user()->friendRequests()->count()}}]
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" role="menu">
                                <a class="dropdown-item" href="{{url('/'.auth()->user()->id).'/editProfile'}}"><i class="fa fa-btn fa-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="{{url('/'.auth()->user()->id.'/friends')}}"><i class="fa fa-bars"></i> Friends
                                    [{{auth()->user()->friends()->count()}}]
                                </a>
                                <a class="dropdown-item" href="{{url('/'.auth()->user()->id.'/notification')}}"><i class="fa fa-globe"></i> Notifications </a>
                                <a class="dropdown-item" href="{{url('/signOut')}}"><i class="fa fa-btn fa-sign-out"></i> Signout</a>
                            </div>
                        </div>
                    </li>
                </ul>

            @else
                <ul class="list">
                    {!! Form::open(['url'=>'/signIn', 'method'=>'post']) !!}

                    {{csrf_field()}}
                    <li>
                        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter email','required'=>'']) !!}
                    </li>
                    <li>
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Enter password','required'=>'']) !!}
                    </li>
                    <li><button type="submit">SignIn</button></li>
                    {!! Form::close() !!}

                </ul>


            @endif

        </div>

    </div>
</div>

</section>
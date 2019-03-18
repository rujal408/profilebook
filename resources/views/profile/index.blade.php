@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row" style="margin-top: 11px;">
        <div class="col-md-4">
            <div class="aboutMe">
            <div class="card">
                <div class="card-header">
                    &nbsp;&nbsp;&nbsp;<i class="fa fa-globe"></i> Introduction
                    @if(auth()->user()->id ==$user->id)
                    <a href="{{url('/'.auth()->user()->id.'/editProfile/editInfo')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EditInfo</a>
                    @endif
                </div>

                <div class=" card-block">

<ul style="list-style: none;">
    <li>{{$user->profile->country}}</li>
    <li>{{$user->profile->city}}</li>
    <li>{{$user->profile->profession}}</li>
</ul>

                </div>

            </div>
            </div>
        </div>
        <div class="col-md-4">


        <div>

            <img src='{{url('images/'.$user->avatar)}}' style="width:222px; height:222px; margin-top: 5px;" data-toggle="modal" data-target="#myModal">&nbsp;

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body">
                            <div class="image-full-div">
                                <div id="crop_tool"></div>
                            <img src='{{url('images/'.$user->avatar)}}' height="222" width="444">



                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="crop_btn">Crop</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
    @if(auth()->user()->id ==$user->id)

            {!! Form::open(['url'=>('/profilePic'),'method'=>'post','enctype'=>'multipart/form-data']) !!}
            {!! Form::token() !!}
            {!! Form::label('Update Profile Image') !!}
            {!! Form::file('avatar') !!}
            <div>
            <button type="submit" style="margin-top:5px;">Upload</button>
            </div>
                {!! Form::close() !!}

        @endif

        </div>
        </div>


        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                    &nbsp;&nbsp;&nbsp;&nbsp;Your Info<a href="{{url('/'.auth()->user()->id.'/editProfile/editUser')}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EditUser</a>
                    </div>
                    <div card="card-block">
                        <ul style="list-style: none;">
                            <li><b>Full name:</b>&nbsp;{{auth()->user()->firstname}}&nbsp; {{auth()->user()->lastname}}</li>
                            <li><b>Email:</b>&nbsp;{{auth()->user()->email}}</li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function () {
    var img_full_div_top=parseInt($('.image-full-div').position().top);
    var img_full_div_left=parseInt($('.image-full-div').position().left);
    $("#crop_tool").css("top",img_full_div_top+50).css("left",img_full_div_left+50);
    $("#crop_tool").resizable({containment:"parent"});
    $("#crop_tool").draggable({containment:"parent"});
    $("#crop_btn").click(function () {
        var img_full_div_top=$('.image-full-div').position().top;
        var img_full_div_left=$('.image-full-div').position().left;
        var crop_tool_top=parseInt($("#crop_tool").position().top);
        var crop_tool_left=parseInt($("#crop_tool").position().left);

        img_full_div_left.toFixed();
        img_full_div_top.toFixed();
        crop_tool_left.toFixed();
        crop_tool_top.toFixed();

        var crop_start_x=img_full_div_left-crop_tool_left;
        var crop_start_y=img_full_div_left-crop_tool_top;

        var crop_tool_width=parseInt($("#crop_tool").width());
        var crop_tool_height=parseInt($("#crop_tool").height());

        crop_tool_width.toFixed();
        crop_tool_height.toFixed();


        alert(crop_tool_left+"|"+crop_tool_top);
    });
});
</script>

@endsection
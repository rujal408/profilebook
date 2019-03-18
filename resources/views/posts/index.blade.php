
@foreach($posts as $post)

{{--Show Posts--}}

    <h4><a href={{url('/'.$post->user->id)}}><img src='{{url('images/'.$post->user->avatar)}}' height="33px" width="33px" style="border-radius: 10%;">&nbsp;{{$post->user->getName()}}</a></h4>
<div style="border: solid 2px;  border-color: rgba(204, 204, 204, 0.85);" class="status">
    <h5 style="margin-left: 10px;">{{$post->status}}</h5>
    <p style="margin-left: 10px;">Created at: {{$post->created_at->diffForHumans()}}</p>

       {{--Show comments--}}

    @if(count($post->comments)>3)
        <div id="view{{$post->id}}">
        <a href={{url('/status/'.$post->id.'/comments')}} style="margin-left:10px;" id="{{$post->id}}" class="viewComments">View all {{$post->comments->count()}} comments
        </a>
        </div>
        <div id="three_comments{{$post->id}}">
        @foreach($post->comments->take(3) as $comment)

            <div class='form-control' style='margin-bottom: 7px;'>

                <li style='list-style: none;'>

                    <a href="{{url('/'.$comment->user->id)}}">
                        <img src="{{url('images/'.$comment->user->avatar)}}" height="22" width="22" style="border-radius: 10%;">
                        {{$comment->user->getName()}} </a>at {{$comment->created_at->diffForHumans()}}<br>{{$comment->comment}}
                </li>
            </div>
        @endforeach
        </div>
        <div id="view_comments{{$post->id}}"></div>

    @else
        @foreach($post->comments as $comment)

         <div class="form-control" id="listComment"  style="margin-bottom: 7px;">

              <li style="list-style: none;">
                  <a href="{{url('/'.$comment->user->id)}}">
                      <img src="{{url('images/'.$comment->user->avatar)}}" height="22" width="22" style="border-radius: 10%;">
                      {{$comment->user->getName()}} </a>at {{$comment->created_at->diffForHumans()}}<br>{{$comment->comment}}
           </li>
        </div>

        @endforeach
        @endif
</div>{{--End Comments--}}
{{--End status--}}
<br>
<div>
{{--Post Comment to the status--}}
{!! Form::open(['url'=>'/status/'.$post->id.'/comment' , 'method'=>'post']) !!}
{{csrf_field()}}
<div class="form-group">
    {!! Form::text('comment',null,['class'=>'form-control','placeholder'=>'Comment here','style'=>'margin-top:-21px;']) !!}
</div>

<div class="form-group">
    <button type="submit" class="btn btn-default" style="display: none;">Comment</button>
</div>
{!! Form::close() !!}<hr>
</div>  {{--Form End--}}

@endforeach


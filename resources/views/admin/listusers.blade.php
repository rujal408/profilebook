@extends('admin.layouts.adminmaster')
@section('adminContent')

    <div class="row">
        <div class="col-md-4"></div>
    <div class="col-md-4">
@if($users)
    <table>
    @foreach($users as $user)

        <li style="list-style: none;">{{$user->firstname}}</li>
    @endforeach

    </table>
        @else
            <h3>No users yet</h3>
@endif
    </div>
    </div>
@endsection
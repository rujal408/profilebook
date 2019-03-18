<html>
<head>
    <title>
        Validation for admin
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{url('css/admin.css')}}" rel="stylesheet">
</head>

    <body>
        <div class="container">

            <div class="row" style="margin-top: 111px;">
                <div class="col-md-4">
                @include('layouts.errors')
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                <h3>Admin Validation</h3>
                    </div>
                {{--For entering password--}}
                 <div class="card-body">
                    <div class="adminSignIn">
                    {!! Form::open(['url'=>'/adminLogIn', 'method'=>'post']) !!}
                    {{csrf_field()}}
                    <div style="padding: 10px;">
                    {!! Form::text('username',null,['placeholder'=>'Username','required'=>'' ,'class'=>'form-control']) !!}
                    </div>
                    <div style="padding: 10px;">
                    {!! Form::password('password',['placeholder'=>'Password','required'=>'','class'=>'form-control']) !!}
                    </div>

                    <div style="padding: 10px;">
                        <button type="submit" class="btn btn-default">SignIn</button>
                    </div>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
            </div>
            <div class="col-md-4">

            </div>


        </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</head>
</html>
@extends("layout.master")
@section("title")
    Social Site
@endsection

@section("content")

    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up </h3>
            {!! Form::open(['method'=>"Post","route"=>"signup","class"=>"form-horizontal"]) !!}
            <div class="form-group {{$errors->has('name')?'has-error':''}}">
                {!! Form::label("name","Name : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::text('name',null,['class'=>"col-xs-10 form-control col-sm-5","Placeholder"=>"Enter User Name"    ]) !!}
                    <span class="help-block">{{$errors->first("name")}}</span>
                </div>
            </div>
            <div class="form-group {{$errors->has('email')?'has-error':''}}">
                {!! Form::label("name","E-mail : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::email('email',null,['class'=>"col-xs-10 form-control col-sm-5","Placeholder"=>"Enter User E-mail address"    ]) !!}
                    <span class="help-block">{{$errors->first("email")}}</span>
                </div>
            </div>
            <div class="form-group {{$errors->has('password')?'has-error':''}}">
                {!! Form::label("password","Password : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::password('password',["type"=>"password",'class'=>"form-control col-xs-10 col-sm-5","Placeholder"=>"Enter the Password"    ]) !!}
                    <span class="help-block">{{$errors->first("password")}}</span>
                </div>
            </div>
            {!! Form::submit("Sign Up",['class'=>"btn btn-primary pull-right"]) !!}
            {!! Form::close() !!}
        </div>

        <div class="col-md-6">
            <h3>Sign In </h3>
            {!! Form::open(['method'=>"Post","route"=>"signin","class"=>"form-horizontal"]) !!}

            <div class="form-group {{$errors->has('email')?'has-error':''}}">
                {!! Form::label("name","E-mail : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::email('email',null,['class'=>"col-xs-10 form-control col-sm-5","Placeholder"=>"Enter User E-mail address"    ]) !!}
                    <span class="help-block">{{$errors->first("email")}}</span>
                </div>
            </div>
            <div class="form-group {{$errors->has('password')?'has-error':''}}">
                {!! Form::label("password","Password : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::password('password',["type"=>"password",'class'=>"form-control col-xs-10 col-sm-5","Placeholder"=>"Enter the Password"    ]) !!}
                    <span class="help-block">{{$errors->first("password")}}</span>
                </div>
            </div>
            {!! Form::submit("Sign In",['class'=>"btn btn-primary pull-right"]) !!}
            {!! Form::close() !!}
        </div>


    </div>


@endsection
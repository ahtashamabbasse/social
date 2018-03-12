@extends("layout.master")

@section("title")
    {{ $user->name  }} Account
@endsection

@section("content")
    {!! Form::open(["route"=>"save","class"=>"form-horizontal"]) !!}
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group {{$errors->has('name')?'has-error':''}}">
                            {!! Form::label("name","Name : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                            <div class="col-sm-9">
                                {!! Form::text('name',$user->name,['class'=>"form-control","Placeholder"=>"Enter User Name" ,"required"=>"required"]) !!}
                                <span class="help-block">{{$errors->first("name")}}</span>
                            </div>
            </div>
            <div class="form-group {{$errors->has('name')?'':''}}">
                {!! Form::label("image","Images : ",["class"=>"col-sm-3 control-label no-padding-right"]) !!}
                <div class="col-sm-9">
                    {!! Form::file('name',['class'=>"form-control"]) !!}
                    {{--<span class="help-block">{{$errors->first("image")}}</span>--}}
                </div>
            </div>
            <div class="form-group">
                {!! Form::submit("Update" ,['class'=>"btn btn-primary pull-right"]) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}






@endsection
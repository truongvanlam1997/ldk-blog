@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-success sm">
                <a href="{{route('author.edit', $author->id )}}">
                    Edit
                </a>
            </button>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">

                <img src="{{$author->avatar}}" alt="{{$author->name}}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label>{{__('Name')}}</label>
                <input type=" text" class="form-control" name='name' value="{{$author->name}}">
            </div>
        </div>

    </div>

    <div class="row">
 
            <div class="col-md-10">
                <div class="form-group">
                    <label>{{__('Description')}}</label>
                    <textarea style={height: 100px} type="text" class="form-control"
                        name='title'>{{$author->description}}</textarea>

                </div>
            </div>
        
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('Address')}}</label>
                <input type="text" class="form-control" name='address' value="{{$author->address}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('NumberPhone')}}</label>
                <input type="phone" class="form-control" name='numberphone' value="{{$author->numberPhone}}">
            </div>
        </div>
       
    </div>



</div>




@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-success sm">
                <a href="{{route('category.edit', $category->id )}}">
                    Edit
                </a>
            </button>
        </div>

    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">

                <img src="{{$category->icon}}" alt="{{$category->name}}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label>{{__('Name')}}</label>
                <input type=" text" class="form-control" name='name' value="{{$category->name}}">
            </div>
        </div>

    </div>

    <div class="row">
 
            <div class="col-md-10">
                <div class="form-group">
                    <label>{{__('Description')}}</label>
                    <textarea style={height: 100px} type="text" class="form-control"
                        name='title'>{{$category->description}}</textarea>

                </div>
            </div>
        
    </div>


    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label>{{__('Parent Name')}}</label>
            <input type="text" class="form-control" name='address' value="{{ empty($category->getParentName()) ? __('Is Category Parent') : $category->getParentName() }}">
            </div>
        </div>
     
       
    </div>

    <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__('Slug')}}</label>
                    <input type="text" class="form-control" name='slug' value="{{$category->slug}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{__('Staus')}}</label>
                    <input type="text" class="form-control" name='status' value="{{$category->getStatus()}}">
                </div>
            </div>
           
        </div>
    



</div>




@endsection

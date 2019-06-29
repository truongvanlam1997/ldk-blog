@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <button class="btn btn-success sm">
        <a href="{{route('post.edit', $post->id )}}">
            Edit
         </a>
        </button>
        <div class="col-md-4">
            <div class="form-group">

                <img src="{{$post->thumbnail}}" alt="{{$post->title}}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label>{{__('Title')}}</label>
                <input type=" text" class="form-control" name='title' value="{{$post->title}}">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('Description')}}</label>
                <input type="text" class="form-control" name='title' value="{{$post->description}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('Author Name')}}</label>
                <input type="text" class="form-control" name='title' value="{{$author->name}}">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <label>{{__('Content')}}</label>
                <textarea style={height: 100px} type="text" class="form-control"
                    name='title'>{{$post->content}}</textarea>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('Slug')}}</label>
                <input type="text" class="form-control" name='title' value="{{$post->slug}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('View')}}</label>
                <input type="text" class="form-control" name='title' value="{{$post->view}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('Status')}}</label>
                <input type="text" class="form-control" name='title' value="{{$post->getStatus()}}">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('Created  At')}}</label>
                <input type="text" class="form-control" name='title' value="{{$post->created_at}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>{{__('Published At')}}</label>
                <input type="text" class="form-control" name='title' value="{{$post->published_at}}">
            </div>
        </div>


    </div>

</div>




@endsection

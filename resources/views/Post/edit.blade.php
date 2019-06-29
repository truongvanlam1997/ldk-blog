@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
     <h2> Edit Post </h2>
     <form action="{{ route('post.update', $post->id) }}" method="Post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="title">{{__('Title')}}</label>
                    <input type="text" class="form-control" id="title" name='title' value="{{$post->title}}">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <img src="{{$post->thumbnail}}" alt="{{$post->title}}"/>
                        <label for="thumbnail">{{__('Thumbnail')}}</label>
                        <input type="file" class="form-control-file" id="thumbnail" name='thumbnail'>
                    </div>
                </div>
            </div>
        
        
            <div class="form-group">
                <label for="description">{{__('Description')}}</label>
        
                <textarea class="form-control" id="description" rows="3" name='description'
                    placeholder="Write a large text here ...">{{$post->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">{{__('Content')}}</label>
                <textarea class="form-control ckeditor" id="content" rows="10" name='content'
                    placeholder="Write a large text here ...">{{$post->content}}</textarea>
        
            </div>
            <div class="form-group">
                    <label for="status">{{__('Author')}}</label>
                    <select id="status" class="form-control" name=author_id>
                    <option selected value="{{$post->author_id}}">{{$post->author->name}}</option>
                        @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
               
            </div>
        
        
        
            <div class="form-group">
                <label for="slug">{{__('Slug')}}</label>
                <input type="text" class="form-control" id="slug" name='slug' value="{{$post->slug}}">
            </div>
        
        
            <div class="form-group">
                <label for="status">{{__('Status')}}</label>
                <select id="status" class="form-control" name=status>
                <option selected value="{{$post->status}}">{{$post->getStatus()}}</option>
                    <option value="0">Enable</option>
                    <option value="1">Disable</option>
                    <option value="2">Draft</option>
                    <option value="3">Private</option>
                </select>
            </div>
        
        
            <div class="form-group ">
                <label for="publish_at">{{__('Publish at')}}</label>
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input data-provide="datepicker" class="form-control datepicker" name='published_at'
                        placeholder="Select date" data-date-format="yyyy/mm/dd" value="{{$post->published_at}}">
                </div>
            </div>
           
        
            <button type="submit" class="btn btn-default">{{__('Update')}}</button>
        
        </form>
    </div>

</div>




@endsection

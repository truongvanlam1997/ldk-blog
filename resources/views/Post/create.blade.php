@extends('layouts.app')

@section('content')
<form action="{{ route('post.insert') }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-8">
            <div class="form-group ">
                <label for="title">{{__('Title')}}</label>
                <input type="text" class="form-control" id="title" name='title'>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="thumbnail">{{__('Thumbnail')}}</label>
                <input type="file" class="form-control-file" id="thumbnail" name='thumbnail'>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 ">
            <div class="form-group">
                <label for="content">{{__('Content')}}</label>
                <textarea class="form-control ckeditor" id="content" rows="10" name='content'
                    placeholder="Write a large text here ..."></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="description">{{__('Description')}}</label>

                <textarea class="form-control " id="description" rows="5" name='description'
                    placeholder="Write a large text here ..."></textarea>
            </div>
        </div>

    </div>
    <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for="tag">{{__('Tag')}}</label>
    
                    <textarea class="form-control " id="tag" rows="3" name='tag'
                        placeholder="Write tag separated by commas (,) "></textarea>
                </div>
            </div>
    
        </div>


    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="status">{{__('Author')}}</label>
                <select id="status" class="form-control" name=author_id>
                    <option selected value="0">Choose...</option>
                    @foreach ($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        
    </div>
    <div class="row">

        <div class="col-8">
            <div class="form-group">
                <label for="slug">{{__('Slug')}}</label>
                <input type="text" class="form-control" id="slug" name='slug'>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-4">

            <div class="form-group">
                <label for="status">{{__('Status')}}</label>
                <select id="status" class="form-control" name=status>
                    <option selected value="1">Choose...</option>
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                    <option value="2">Draft</option>
                    <option value="3">Private</option>
                </select>
            </div>

        </div>
        <div class="col-4">
            <div class="form-group ">
                <label for="publish_at">{{__('Publish at')}}</label>
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input data-provide="datepicker" class="form-control datepicker" name='published_at'
                        placeholder="Select date" data-date-format="yyyy/mm/dd" value="">
                </div>
            </div>
        </div>

    </div>
















    <button type="submit" class="btn btn-default">{{__('Create')}}</button>

</form>
@endsection

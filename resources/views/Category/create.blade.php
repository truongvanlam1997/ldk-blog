@extends('layouts.app')

@section('content')
<form action="{{ route('category.insert') }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="name">{{__('Name')}}</label>
                <input type="text" class="form-control" id="name" name='name'>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="icon">{{__('Icon')}}</label>
                <input type="file" class="form-control-file" id="icon" name='icon'>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10">
            <div class="form-group">
                <label for="description">{{__('Description')}}</label>

                <textarea class="form-control" id="description" rows="3" name='description'
                    placeholder="Write a large text here ..."></textarea>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="parentId">{{__('Parent Name')}}</label>
                <select id="parentId" class="form-control" name=parent_id>

                    <option selected value="0">Choose...</option>
                    @foreach ($categoryNames as $categogyId => $categoryName)

                    <option value="{{$categogyId}}">{{$categoryName}}</option>

                    @endforeach

                </select>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label for="status">{{__('Status')}}</label>
                <select id="status" class="form-control" name=status>
                    <option selected value="1" >Choose...</option>
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                    <option value="2">Draft</option>
                    <option value="3">Private</option>

                </select>
            </div>
        </div>
    </div>



    <button type="submit" class="btn btn-default">{{__('Create')}}</button>

</form>
@endsection

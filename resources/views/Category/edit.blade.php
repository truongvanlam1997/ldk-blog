@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2> Edit Category </h2>
            <form action="{{ route('category.update', $category->id) }}" method="Post">
                @csrf
                @method('put')

                <div class="row">

                    <div class="col-4">
                        <div class="form-group">
                            <img src="{{$category->icon}}" alt="{{$category->name}}" />
                            <label for="avatar">{{__('Icon')}}</label>
                            <input type="file" class="form-control-file" id="avatar" name='avatar'>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="name">{{__('Category Name')}}</label>
                            <input type="text" class="form-control" id="name" name='name' value="{{$category->name}}">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="description">{{__('Description')}}</label>

                            <textarea class="form-control" id="description" rows="3" name='description'
                                placeholder="Write a large text here ...">{{$category->description}}</textarea>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="parentId">{{__('Parent Name')}}</label>
                            <select id="parent_id" class="form-control" name=parent_id>

                                <option selected value="{{$category->parent_id}}">
                                    {{ isset($category->parentCategory->name)==null ? __('Is Parent Category') : $category->parentCategory->name}}
                                </option>
                                @foreach ($categoryNames as $categogyId => $categoryName)

                                <option value="{{$categogyId}}">{{$categoryName}}</option>

                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select id="status" class="form-control" name=status>
                                <option selected value="{{$category->status}}">{{$category->getStatus()}}</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                                <option value="2">Draft</option>
                                <option value="3">Private</option>

                            </select>
                        </div>
                    </div>
                </div>



                <button type="submit" class="btn btn-default">{{__('Update')}}</button>

            </form>
        </div>
    </div>

</div>




@endsection

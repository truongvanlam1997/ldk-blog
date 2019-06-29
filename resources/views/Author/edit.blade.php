@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2> Edit Post </h2>
            <form action="{{ route('author.update', $author->id) }}" method="Post">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="name" name='name' value="{{$author->name}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <img src="{{$author->avatar}}" alt="{{$author->name}}" />
                            <label for="avatar">{{__('Avatar')}}</label>
                            <input type="file" class="form-control-file" id="avatar" name='avatar'>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="description">{{__('Description')}}</label>

                            <textarea class="form-control" id="description" rows="3" name='description'
                                placeholder="Write a large text here ...">{{$author->description}}</textarea>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-8">

                        <div class="form-group">
                            <label for="adrress">{{__('Address')}}</label>
                            <input type="text" class="form-control" id="adrress" name='adrress'
                                value="{{$author->adrress}}">
                        </div>
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-5">

                        <div class="form-group">
                            <label for="numberphone">{{__('NumberPhone')}}</label>
                            <input type="numberphone" class="form-control" id="numberphone" name='numberphone'
                                value="{{$author->numberphone}}">
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">{{__('Status')}}</label>
                            <select id="status" class="form-control" name=status>
                                <option selected value="{{$author->status}}">{{$author->getStatus()}}</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                             
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

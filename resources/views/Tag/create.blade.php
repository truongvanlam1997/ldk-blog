@extends('layouts.app')

@section('content')
<form action="{{ route('tag.insert') }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label for="name">{{__('name')}}</label>
                <input type="text" class="form-control" id="name" name='name'>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-default">{{__('Create')}}</button>

</form>
@endsection

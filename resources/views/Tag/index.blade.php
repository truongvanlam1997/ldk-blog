@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>
            Tags Index
        </h1>

        <div class="col-md-8 pb-20">
            <a href="{{route('tag.create')}}">
                <div class="btn btn-primary"> Create Tag</div>
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>

                        <th></th>
                    </tr>
                </thead>
                @foreach ($tags as $tag)
                <tbody>
                    <tr>
                        <td>
                            {{$tag->id}}
                        </td>
                        <td>
                            <a href="{{ route('tag.show', $tag) }}"> {{$tag->name}} </a>
                        </td>

                        <td>
                            <button class="btn btn-danger sm"><a
                                    href="{{route('tag.delete',$tag->id)}}">Delete</a></button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>


        </div>
    </div>
</div>
@endsection

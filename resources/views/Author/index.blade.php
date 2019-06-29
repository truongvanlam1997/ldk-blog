@extends('layouts.app')

@section('content')
<div class="container pt-30">
    <div class="row ">
        <h2>
            Author Index
        </h2>

        <div class="col-md-8 pb-20">
            <a href="{{route('author.create')}}">
                <div class="btn btn-primary"> Create Author</div>
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>NumberPhone</th>

                        <th></th>
                    </tr>
                </thead>
                @foreach ($authors as $author)
                <tbody>
                    <tr>

                        <th>
                            <img src="{{$author->avatar}}" alt="{{$author->name}}">
                            <a href="{{ route('author.show', $author->id) }}"> {{$author->name}} </a>
                        </th>


                        <td>
                            {{$author->description}}
                        </td>

                        <td>
                            {{$author->address}}
                        </td>

                        <td>
                            {{$author->numberphone}}
                        </td>

                        <td>
                            <button class="btn btn-danger sm"><a
                                    href="{{route('author.delete',$author->id)}}">Delete</a></button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>



        </div>
    </div>
    @endsection

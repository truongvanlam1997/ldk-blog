@extends('layouts.app')

@section('content')
<div class="container pt-30">
    <div class="row ">
        <h2>
            Category Index
        </h2>

        <div class="col-md-8 pb-20">
            <a href="{{route('category.create')}}">
                <div class="btn btn-primary"> Create Category </div>
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Description</th>
                        <th>Status</th>

                        <th></th>
                    </tr>
                </thead>
                @foreach ($categories as $category)
                <tbody>
                    <tr>

                        <th>
                            <img src="{{$category->icon}}" alt="{{$category->name}}">
                            <a href="{{ route('category.show', $category->id) }}"> {{$category->name}} </a>
                        </th>

                        <td>
                            {{$category->getParentName()}}
                        </td>
                        <td>
                            {{$category->description}}
                            
                        </td>

                        <td>
                            {{$category->getStatus()}}
                        </td>

                        

                        <td>
                            <button class="btn btn-danger sm"><a
                                    href="{{route('category.delete',$category->id)}}">Delete</a></button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>



        </div>
    </div>
    @endsection

@extends('layouts.app')

@section('content')
<div class="container pt-30">
    <div class="row ">
        <h1>
            Post Index
        </h1>

        <div class="col-md-8 pb-20" >
            <a href="{{route('post.create')}}">
            <div class="btn btn-primary"> Create Post</div>
            </a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Name Author</th>
                        <th>Slug</th>
                        <th> Tag </th>
                        <th>View</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                <tbody>
                    <tr>
                        <td>
                            <a href="{{ route('post.show', $post->id) }}"> {{$post->title}} </a>
                        </td>
                        <td>
                            {{$post->author->name}}
                        </td>
                        <td>
                            {{$post->slug}}
                        </td>
                        <td>
                            @foreach ( $post->getArrayTagOfPost() as $tagName)
                           <button class="btn btn-success sm mb-2" >{{$tagName  }}</button>  
                            @endforeach
                          
                        </td>
                        <td>
                            {{$post->view}}
                        </td>
                        <td>
                            {{$post->getStatus()}}
                        </td>
                        <td> 
                        <button class="btn btn-danger sm"><a href="{{route('post.delete',$post->id)}}">Delete</a></button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>



    </div>
</div>
@endsection

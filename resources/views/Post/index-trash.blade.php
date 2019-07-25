

@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        {{ __('List Post') }}

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('Post') }}</a></li>
        <li class="active">{{ __('Trash') }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-7">

            </div>
            <div class="col-md-5" style="text-align: right;">

                <form action="{{route('post.search-trash')}}" class="form-inline" method="GET">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" name="searchTitle">
                    <select class="form-control" name="searchBy">
                        <option selected value="title">Title</option>
                        <option value="id">ID</option>
                    </select>
                    <button class="btn btn-primary " type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <form action=" {{route('post.bulk')}}" method="GET">
                <div class="col-md-12">

                    <select style="display: inline-block; width: 175px;" class="form-control " name="bulkAction">
                        <option selected>Choose Bunk Actions</option>
                        <option value="restore">Bulk Restore</option>
                        <option value="forceDelete">Bulk Delete</option>
                        <option value="import">Bulk Import</option>
                    </select>
                    <button type="submit" class=" btn btn-primary btn-sm">Apply</button>

                </div>
              

                <div class="container">
                    <ul class="nav nav-tabs">
                        <li ><a href="{{route('post.index')}}">List Of Post</a></li>
                        <li class="active"><a href="#">List Of Trash Post</a></li>

                    </ul>
                </div>
                <div class="tab-content">
                    <div class="col-md-12 pb-20">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="toggleCheckbox">
                                    </th>
                                    <th>ID<a href="post/sort?sort=title&order=asc" class="oi oi-arrow-thick-top"></a><a
                                            href="post/sort?sort=title&order=desc" class="oi oi-arrow-thick-bottom"></a>
                                    </th>
                                    <th> Thumbnail</th>
                                    <th>Title<a href="post/sort?sort=title&order=asc"
                                            class="oi oi-arrow-thick-top"></a><a
                                            href="{{route('post.sort' ,['sort' => 'title' , 'order'=>'desc'])}}"
                                            class="oi oi-arrow-thick-bottom"></a> </th>
                                    <th>Name Author</th>

                                    <th> Tag </th>
                                    <th>View</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @foreach ($postTrashes as $post)
                            <tbody>
                                <tr>

                                    <td>
                                        <input type="checkbox" value="{{$post->id}}" name=postId[]>
                                    </td>

                                    <td>{{$post->id}} </td>
                                    <td>
                                        <img style="text-align:center " src="{{asset($post->thumbnail)}}" alt="{{$post->title}}" class="img-thumbnail thumbnail-post-width">
                                    </td>
                                    <td>
                                        <a href="{{ route('post.show', $post->id) }}"> {{$post->title}} </a>
                                    </td>
                                    <td>
                                        {{$post->author->name}}
                                    </td>

                                    <td>
                                        @foreach ( $post->getArrayTagOfPost() as $tagName)
                                        <button class="btn btn-success btn-sm mb-2">{{$tagName  }}</button>
                                        @endforeach

                                    </td>
                                    <td>
                                        {{$post->view}}
                                    </td>
                                    <td>
                                        {{$post->getStatus()}}
                                    </td>
                                    <td>
                                        <nav class="btn btn-primary btn-sm"><a class="text-white"
                                                href="{{route('post.restore',$post->id)}}">Restore</a></nav>
                                        <nav class="btn btn-warning btn-sm"><a class="text-white"
                                            href="{{route('post.delete',$post->id)}}">Delete</a></nav>
                                        <nav class="btn btn-info btn-sm"><a class="text-white" href="#">Import</a></nav>

                                      
                                    
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>


                </div>

                {{-- <nav class="">{{$postTrashes->appends($orderBy)->links()}}</nav> --}}

            </form>
        </div>
    </div>

    </div>


</section>



@endsection

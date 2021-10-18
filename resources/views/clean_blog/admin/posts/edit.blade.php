@extends('clean_blog.admin.layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Update Post</h1>
        </div><!-- /.col -->
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" value="{{$post->title}}" placeholder="Title">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <input type="text" class="form-control " name="subtitle" value="{{$post->subtitle}}" placeholder="Subtitle">
                    @error('subtitle')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="mb-3">
                    <textarea class="form-control" name="content" rows="5" placeholder="Content">{{$post->content}}</textarea>
                     @error('content')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="mb-3">
                    <input type="file" name="image" class="form-control ">
                    <img width="120" src="{{asset('upload/'.$post->image)}}" alt="">
                    </div>
                    <div class="mb-3">
                    <select name="category_id" class="form-control">
                        <option value="{{$post->category_id}}"  selected>{{$post->category->name}}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>

                    <button class="btn btn-success">
                        Update
                    </button>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
</div>
@stop

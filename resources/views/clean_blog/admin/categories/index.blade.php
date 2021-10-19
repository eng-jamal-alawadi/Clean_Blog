@extends('clean_blog.admin.layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">All Categories</h1>
        </div><!-- /.col -->
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-12">
        {{-- @if (session('success'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif --}}

        @section('script')
        <script>
            @if(session('success'))
            toastr.success("{{session('success')}}")
            @endif
        </script>
        @stop

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Categories</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>

<form class="d-inline" action="{{ route('categories.destroy', $category->id) }}" method="POST">
@csrf
@method('delete')
<button onclick="return confirm('are you sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
</form>
                        </td>
                      </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
</div>
                <div>
                    <p style="justify-content: center">{{$categories->links()}}</p>

                </div>
</div>
@stop

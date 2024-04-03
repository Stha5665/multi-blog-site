@extends('layouts.admin')
 
@section('content')
    <div class="row">
        <div class="col-md-12 ">
        @include('message.success')
            <div class="card">
                <div class="card-header">
                    <h3>Blogs
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm float-right">Add Blogs</a>
                    </h3>
                </div>
                <div class="card-body">
                
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $blog->category->category_name }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>
                                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST">
                
                                    <a class="btn btn-info btn-sm d-block" href="{{ route('blogs.show',$blog->id) }}">Show</a>
                    
                                    <a class="btn btn-primary btn-sm d-block " href="{{ route('blogs.edit',$blog->id) }}">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="radio" class="btn btn-sm btn-danger d-block deleteBtn">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $blogs->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

    @push('script')
    <script>
        $(function(){
            $(document).on('click', '.deleteBtn', function(e){
                if(!confirm("Are you sure you want to delete this?")){
                    e.preventDefault();
                }
            });

        });
    </script>
    @endpush
      

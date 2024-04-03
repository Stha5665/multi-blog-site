@extends('layouts.admin')
 
@section('content')

@include('blogsCategory.modal-form')
    <div class="row">
        <div class="col-md-12 ">
        @include('message.success')
            <div class="card">
                <div class="card-header">
                    <h3>Blogs
                        <a class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Short Description</th>
                           
                            <th>Action</th>
                        </tr>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->short_description }}</td>
                
                            <td>
                            <a class="btn btn-primary btn-sm d-block " href="#">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No Category Available</td>
                        </tr>
                        @endforelse
                    </table>
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

            // $('#saveBtn').click(function(e){
            //     e.preventDefault();


            // })

        });
    </script>
    @endpush
      

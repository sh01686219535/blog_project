@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Blog Tables</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Author Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1@endphp
                        @foreach($blogs as $blog)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$blog->category_name}}</td>
                                <td>{{$blog->author_name}}</td>
                                <td>{{$blog->title}}</td>
                                <td>{!! $blog->description !!}</td>
                                <td>
                                    <img src="{{asset($blog->image)}}" style="height: 50px;width: 50px;" alt="">
                                </td>
                                <td>{{$blog->date}}</td>
                                <td>{{$blog->status}}</td>
                                <td>
                                    @if($blog->status)
                                        <a href="{{route('blogStatus',['id'=>$blog->id])}}" class="btn btn-outline-success">Unpublished</a>
                                    @else
                                        <a href="{{route('blogStatus',['id'=>$blog->id])}}" class="btn btn-outline-success">Published</a>

                                    @endif
                                    <a href="{{route('edit-blog',['id'=>$blog->id])}}" class="btn btn-outline-primary" title="Edit">Edit</a>
                                    <form action="{{route('delete-blog')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        <input type="submit" value="Delete"  class=" btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure delete this')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

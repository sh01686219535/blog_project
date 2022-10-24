@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Category Tables</h1>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                                {{$category->status}}
                            </td>
                            <td>
                                @if($category->status)
                                    <a href="{{route('status',['id'=>$category->id])}}" class="btn btn-outline-success">Unpublished</a>
                                @else
                                    <a href="{{route('status',['id'=>$category->id])}}" class="btn btn-outline-success">Published</a>
                                @endif
                                <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-outline-primary" title="Edit">Edit</a>
                                <form action="{{route('delete-category')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="category_id" value="{{$category->id}}">
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


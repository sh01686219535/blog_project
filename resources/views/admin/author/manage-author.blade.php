@extends('admin.master')
@section('title')
    Manage Blog
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Author Tables</h1>
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
                            <th>Author name</th>
                            <th>Author Biography</th>
                            <th>Author Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i=1 @endphp
                        @foreach($Authors as $Author)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$Author->author_name}}</td>
                                <td>{{$Author->author_biography}}</td>
                                <td>
                                    <img src="{{asset($Author->author_image)}}" style="width: 50px;height:50px;"alt="">
                                </td>
                                <td>
                                    {{$Author->status}}
                                </td>
                                <td>
                                    @if($Author->status)
                                        <a href="{{route('authorStatus',['id'=>$Author->id])}}" class="btn btn-outline-success">Unpublished</a>
                                    @else
                                        <a href="{{route('authorStatus',['id'=>$Author->id])}}" class="btn btn-outline-success">Published</a>

                                    @endif
                                        <a href="{{route('edit-author',['id'=>$Author->id])}}" class="btn btn-outline-primary" title="Edit">Edit</a>
                                        <form action="{{route('delete-author')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="author_id" value="{{$Author->id}}">
                                            <input type="submit" value="Delete"  class=" btn btn-outline-danger" title="Delete" onclick="return confirm('Are you sure delete this')">
                                        </form>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection


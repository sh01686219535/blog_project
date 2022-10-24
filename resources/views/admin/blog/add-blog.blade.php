@extends('admin.master')
@section('title')
    Add Blog
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Blog form</h3></div>
                        <div class="card-body">
                            <form action="{{route('new-blog')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select name="category_id" class="form-control">
                                                <option value="">Select A Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select name="author_id" class="form-control">
                                                <option value="">Select A Author</option>
                                                @foreach($authorize as $author)
                                                    <option value="{{$author->id}}">{{$author->author_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" name="title" placeholder="Title" />
                                    <label for="inputEmail">Title</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" name="slug" placeholder="URL" />
                                    <label for="inputEmail">Slug</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="editor" type="text" name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="date" name="date" />
                                    <label for="inputEmail">Date</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="file" name="image"/>
                                </div>
                                <div class="mt-4 mb-0">
                                    <input type="submit" value="Submit" class="form-control btn btn-outline-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

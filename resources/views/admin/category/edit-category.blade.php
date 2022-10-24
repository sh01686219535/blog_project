@extends('admin.master')
@section('title')
    Add Category
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Category form</h3></div>
                        <div class="card-body">
                            <form action="{{route('update-category')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" value="{{$category->category_name}}" name="category_name" placeholder="Category Name" />
                                    <label for="inputEmail">Category Name</label>
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


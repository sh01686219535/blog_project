@extends('admin.master')
@section('title')
    Edit Author
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Author form</h3></div>
                        <div class="card-body">
                            <form action="{{route('update-author')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="author_id" value="{{$author->id}}">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" value="{{$author->author_name}}" name="author_name" placeholder="Author Name" />
                                    <label for="inputEmail">Author Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="inputEmail" type="text" value="{{$author->author_biography}}" name="author_biography" placeholder="Author Biography" ></textarea>
                                    <label for="inputEmail">Author Biography</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" name="author_image" class="form-control">
                                    <img src="{{asset($author->author_image)}}" style="width: 50px;height:50px;"alt="">
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


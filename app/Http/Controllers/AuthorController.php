<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public $author,$image,$imageName,$directory,$imageUrl;
    public function addAuthor(){
        return view('admin.author.add-author');
    }
    public function ManageAuthor(){
        return view('admin.author.manage-author',[
            'Authors'=>Author::all()
        ]);
    }
    public function saveAuthor(Request $request){
        $this->author=new Author();
        $this->author->author_name=$request->author_name;
        $this->author->author_biography=$request->author_biography;
        if ($request->file('author_image')){
            $this->author->author_image=$this->saveImage($request);
        }
        $this->author->save();
        return back();
    }
    private function saveImage($request){
        $this->image=$request->file('author_image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='AdminAsset/author-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function editAuthor($id){
        return view('admin.author.edit-author',[
            'author'=>Author::find($id)
        ]);
    }
    public function deleteAuthor(Request $request){
        $this->author=Author::find($request->author_id);
        if ($this->author->author_image){
            unlink($this->author->author_image);
        }
        $this->author->delete();
        return back();
    }
    public function updateAuthor(Request $request){
        $this->author=Author::find($request->author_id);
        $this->author->author_name=$request->author_name;
        $this->author->author_biography=$request->author_biography;
        if ($request->file('author_image')){
            $this->author->author_image=$this->saveImage($request);
        }
        $this->author->save();
        return redirect('/manage-author');
    }
    public function authorStatus($id){
        $this->author=Author::find($id);
        if ($this->author->status==1) {
            $this->author->status = 0;
            $this->author->save();
            return back();
        }else{
            $this->author->status=1;
            $this->author->save();
            return back();
        }
    }
}

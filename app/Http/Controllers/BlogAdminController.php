<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;
use DB;
use function Symfony\Component\String\b;

class BlogAdminController extends Controller
{
    public $blog,$image,$imageName,$directory,$imageUrl;
    public function addBlog(){
        return view('admin.blog.add-blog',[
            'categories'=>category::where('status',1)->orderby('id','desc')->get(),
            'authorize'=>Author::where('status',1)->orderby('id','desc')->get()
        ]);
    }
    public function manageBlog(){
        $blogs=DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','authors.author_name','categories.category_name')
            ->orderby('id','desc')
            ->get();
        return view('admin.blog.manage-blog',[
            'blogs'=>$blogs
        ]);
    }
    public function saveBlog(Request $request){
        $this->blog=new blog();
        $this->blog->category_id=$request->category_id;
        $this->blog->author_id=$request->author_id;
        $this->blog->title=$request->title;
        $this->blog->slug=$this->makeSlug($request);
        $this->blog->description=$request->description;
        $this->blog->date=$request->date;
        if ($request->file('image')){
            $this->blog->image=$this->saveImage($request);
        }
        $this->blog->save();
        return back();
    }
    private function saveImage($request){
        $this->image=$request->file('image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='AdminAsset/blog-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function makeSlug($request){
        if ($request->slug){
            $str=$request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }else{
            $str=$request->title;
            return preg_replace('/\s+/u','-',trim($str));
        }
    }
    public function statusBlog($id){
        $this->blog=blog::find($id);
        if ($this->blog->status==1){
            $this->blog->status=0;
            $this->blog->save();
            return back();
        }else{
            $this->blog->status=1;
            $this->blog->save();
            return back();
        }
    }
    public function editBlog($id){
        return view('admin.blog.edit-blog',[
            'blogs'=>blog::find($id)
        ]);
    }
    public function deleteBlog(Request $request){
        $this->blog=blog::find($request->blog_id);
        if ($this->blog->image){
            unlink($this->blog->image);
        }
        $this->blog->delete();
        return back();
    }
}

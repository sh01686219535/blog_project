<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $category;
    public function addCategory(){
        return view('admin.category.add-category');
    }
    public function manageCategory(){
        return view('admin.category.manage-category',[
            'categories'=>category::all()
        ]);
    }
    public function saveCategory(Request $request){
        $this->category=new category();
        $this->category->category_name=$request->category_name;
        $this->category->save();
        return back();
    }
    public function EditCategory($id){
        return view('admin.category.edit-category',[
            'category'=>category::find($id)
        ]);
    }
    public function UpdateCategory(Request $request){
        $this->category=category::find($request->category_id);
        $this->category->category_name=$request->category_name;
        $this->category->save();
        return redirect('/manage-category');
    }
    public function DeleteCategory(Request $request){
        $this->category=category::find($request->category_id);
        $this->category->delete();
        return back();
    }
    public function CategoryStatus($id){
        $this->category=category::find($id);
        if ($this->category->status==1){
            $this->category->status=0;
            $this->category->save();
            return back();
        }else{
            $this->category->status=1;
            $this->category->save();
            return back();
        }
    }
}

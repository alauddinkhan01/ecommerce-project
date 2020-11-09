<?php

namespace App\Http\Controllers;

use App\Category;
use App\Section;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categories=Category::all();
        return view('admin.category.category',compact('categories'));
    }
    public function updatecategory(Request $request,$id)
    {
        $category=Category::find($id);
        $category->status=$request->status;
        $category->save();
        return redirect()->back();
    }
    public function addeditcategory(Request $request,$id=null)
    {
        $category= new Category();
        if($id=='')
        {
            echo'add category';
            
        }
        else
        {
            echo'edit category';
        }
        if($request->isMethod('post'))
        { 
            $data=$request->all();
            $rules=[
                'category_name'=>'required',
                'section_id'=>'required',
                'url'=>'required',
                'category_image'=>'image'
            ];
            $custommessage=[
                'category_name.required'=>'Category Name is Required',
                'category_name.regex'=>'Enter a Valid Name',
                'section_id.required'=>'Section ID is Required',
                'url.required'=>'URL is Required',
                'category_image.image'=>'Valid Image is Required'
            ];
            $this->validate($request,$rules,$custommessage);
            
            if($file=$request->file('categoryimage'))
            {
                
                // $photo=new Photo();
                $name=time().'_'.$file->getClientOriginalName();
                $file->storeAs('public/images/category_images',$name);
                $category->categoryimage=$name;

                // $category->save();
            }
            if(empty($data['description']))
            {
                echo "Hell"; 
                $data['description']='';
            }
            if(empty($data['category_discount']))
            {
                $data['category_discount']='';
            }
            if(empty($data['meta_title']))
            {
                $data['meta_title']='';
            }
            if(empty($data['meta_description']))
            {
                $data['meta_description']='';
            }
            if(empty($data['meta_keyword']))
            {
                $data['meta_keyword']='';
            }
            $category->parent_id=$data['parent_id'];
            $category->section_id=$data['section_id'];
            $category->category_name=$data['category_name'];
            $category->category_discount=$data['category_discount'];
            $category->description=$data['description'];
            $category->url=$data['url'];
            $category->meta_title=$data['meta_title'];
            $category->meta_description=$data['meta_description'];
            $category->meta_keyword=$data['meta_keyword'];
            $category->status= 1;
            $category->save();
            

            // echo '<pre>'; print_r($data); die;
        }
        $allsections=Section::all();
        return view('admin.category.addeditcategory',compact('allsections'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory(){
        $data = Category::orderBy('id','desc')->get();
        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }
    public function getCategoryHeader(){
        $data = Category::where('isheader',true)->orderBy('id','desc')->get();
        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }

    public function getCategoryNotHeader(){
        $data = Category::where('isheader',null)->orWhere('isheader',false)->orderBy('id','desc')->get();
        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }

    public function getCategoryTree(){
        $data = Category::where('parent',null)->with(str_repeat('children.',10))->orderBy('id','asc')->get();
        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }

    public function detailCategory(Request $request){
        $data = Category::where('id',$request->id)->get();

        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }

    public function createCategory(Request $request){
        $request->validate([
            'name' =>'required|unique:categories,name',
            'parent'  =>'nullable',
            'isheader'  =>'nullable',
        ]);

        $data = new Category;
        $data->name = $request->name;
        $data->parent = $request->parent;
        $data->isheader = $request->isheader;
        $data->save();

        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }

    public function editCategory(Request $request){
        $request->validate([
            'name' =>'required',
            'parent'  =>'nullable',
            'isheader'  =>'nullable',

        ]);

        $data = new Category;
        $data->name = $request->name;
        $data->parent = $request->parent;
        $data->isheader = $request->isheader;
        $data->save();

        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }

    public function deleteCategory(Request $request){

        $data = Category::find($request->id);
        $data->delete();

        $response = [
            'success'=>true,
            'category'=>$data,
        ];
        
        return response($response,200);
    }
}

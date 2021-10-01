<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function getContent(){
        $data = Content::orderBy('id','desc')->paginate(10);
        $response = [
            'success'=>true,
            'content'=>$data,
        ];
        
        return response($response,200);
    }

    public function detailContent(Request $request){
        $data = Content::find($request->id);

        $response = [
            'success'=>true,
            'content'=>$data,
        ];
        
        return response($response,200);
    }

    public function getSearchContent(Request $request){
        $request->validate([
            'search' =>'nullable',
        ]);

        $data = Content::where('name','like',"%".$request->search."%")
        ->orWhere('desc','like',"%".$request->search."%")
        ->paginate(10);

        $response = [
            'success'=>true,
            'content'=>$data,
        ];
        
        return response($response,200);
    }

    public function createContent(Request $request){
        $request->validate([
            'name' =>'required',
            'desc'  =>'nullable',
            'link'  =>'required',
        ]);

        $data = new Content;
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->link = $request->link;
        $data->save();

        $response = [
            'success'=>true,
            'content'=>$data,
        ];
        
        return response($response,200);
    }

    public function editContent(Request $request){
        $request->validate([
            'name' =>'required',
            'desc'  =>'nullable',
            'link'  =>'required',
        ]);

        $data = Content::find($request->id);
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->link = $request->link;
        $data->save();

        $response = [
            'success'=>true,
            'content'=>$data,
        ];
        
        return response($response,200);
    }

    public function deleteContent(Request $request){

        $data = Content::find($request->id);
        $data->delete();

        $response = [
            'success'=>true,
            'content'=>$data,
        ];
        
        return response($response,200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Classify;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassifyController extends Controller
{
    //

    public function list()
    {
        $list_classify = Classify::all();
        return view('admin.classify.list',['list_classify'=> $list_classify]);
    }

    public function add()
    {
        return view('admin.classify.add');
    }

    public function postAdd(Request $request)
    {
        $classify = new Classify;


        $classify->name = $request->name;
        $classify->description = $request-> description;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
        
            $late = $file->getClientOriginalExtension();
            if ($late !="jpg" && $late != "png" && $late != "jpeg") {
                return back()->with('error_img','Sai định dạng hình ');
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4)."_".$name;
        
            while (file_exists("uploads/classify/".$img)) {
                $img = Str::random(4)."_".$name;
            }
            
            $file->move("uploads/classify",$img);
            $classify->image = $img;
            
        }
        else{
            $classify->image ="";
        }
    
        $classify -> save();

        return back()->with('add','Thêm thành công '.$classify->name);
    }

    public function edit($id)
    {
        $classify = Classify::find($id);
        return view('admin.classify.edit',['classify'=>$classify]);
    }

    public function postEdit(Request $request,$id)
    {
        $classify = Classify::find($id);


        $classify->name = $request->name;
        $classify->description = $request-> description;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
        
            $late = $file->getClientOriginalExtension();
            if ($late !="jpg" && $late != "png" && $late != "jpeg") {
                return back()->with('error_img','Sai định dạng hình ');
            }
            $name = $file->getClientOriginalName();
            $img = Str::random(4)."_".$name;
        
            while (file_exists("uploads/classify/".$img)) {
                $img = Str::random(4)."_".$name;
            }
            
            $file->move("uploads/classify",$img);
            $classify->image = $img;
            
        }
        else{
            $classify->image ="";
        }
        $classify -> save();

        return back()->with('edit','Sửa thành công '.$classify->name);
    }

    public function delete($id)
    {
        $classify = Classify::find($id);
        $classify->delete();
        return back()->with('delete','Xóa thành công '.$classify->name);

    }
}

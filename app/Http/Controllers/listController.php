<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class listController extends Controller
{
    public function index()
    {

        $lists = Articles::orderBy('id','asc')->paginate(5);
        return view('Colleges.index', compact('lists'));
    }


    public function create()
    {
        return view('Colleges.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'count' => 'required',
            'information' => 'required',

        ]);

        Articles::create($request->post());

        return redirect()->route('lists.index')->with('success','Company has been created successfully.');
    }





    public function insertComment(Request $request,$id)
    {

    //  return $request->all();


        //$validatior = Validator::make($request->all(), [
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'category_id'=>'required',
            'count' => 'required',
            'information' => 'required',
            'time' => 'required',
            'file' => 'required',
        ], [
            'email.email' => 'درست ایمیل بزن',
            'name.required' => 'خالی ول نکن',
            'name.alpha' => '  نام باید حروف باشد'
        ]);
//        return $validatior->errors()->all();
//        if ($validatior->fails()) {
////            Session::flash('error','sorry! Error While Sendign Data!');
////            return  back();
//            return ["result" => $validatior->errors()->all(), "status" => false];
////            return  redirect('contact-us')->withErrors($validatior)->withInput();
//        }
        $fileName = time().'.'.$request->file->extension();

        $request->file->move(public_path('uploads'), $fileName);
        Articles::create([
            "user_id" => $request->user_id,
            'title' => $request->title,
            'information' => $request->information,
            "category_id" => $request->category_id,
            'count' => $request->count,
            'time' => $request->time,
            'file' => $fileName,


        ]);

            session()->flash('status','your ide generated succssfuly');
        return  redirect()->route('author',['id'=>$id]) ->with('file', $fileName);
//            return ["status" => true];


    }




    public function show(Articles $list)
    {

        return view('Colleges.show',compact('list'));
    }


//    public function edit(Articles $list)
//
//    {
//
//
//        return view('Colleges.edit',compact('list'));
//    }
    public function edit(Articles $list)

    {

//dd($list); die();
        return view('Colleges.edit',compact('list'));
    }

    public function editArticle(Request $request,$id)
    {

//       return view('Colleges.edit',compact('list'));
       //die();
        if(isset($request->file)) {
            $fileName = time() . '.' . $request->file->extension();

            $request->file->move(public_path('uploads'), $fileName);
        }
        if(isset($fileName)){
            $file_name=$fileName;
        }
        else{
            $file_name='';
        }
      $update= Articles::where('id', $id)->update(['title' => $request->title,'information'=>$request->information,'category_id'=>$request->category_id,'count'=>$request->count,'file'=>$file_name,'time'=>$request->time]);
    //  dd($update); die();
        return redirect()->route('author',['id'=>$request->user_id]);

}

    public function update(Request $request, Articles $list)
    {
    // dd($request->post()); die();
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'count' => 'required',
            'information' => 'required',

        ]);

        $list->fill($request->post())->save();

        return redirect()->route('author',['id'=>3])->with('success','Company Has Been updated successfully');
    }


    public function destroy(Articles $article)
    {
        dd($article); die();
        $list->delete();
        return redirect()->route('lists.index')->with('success','Company has been deleted successfully');
    }

    public function deleteArticle($id)
    {
        $user_id=Articles::where('id', $id)->first()->user_id;

        $user = Articles::where('id', $id)->firstorfail()->delete();
        echo ("User Record deleted successfully.");
        return redirect()->route('author',['id'=>$user_id]);
    }
}

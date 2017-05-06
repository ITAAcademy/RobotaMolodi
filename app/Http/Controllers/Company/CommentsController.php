<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Industry;
use App\Models\City;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Resume;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use App\Models\News;
use View;
use Input;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    public function showComments($id, Guard $auth){


//        if(Request::ajax()){
//            dd('q');
//            if($_REQUEST == null){
//                $comments = Comment::where('company_id', '=', $id)->get();
//                dd('ddd');
//            }else{
//                dd('d');
//                $com = new Comment();
//                $com->users_id = auth()->user()->user_id;
//                $com->company_id = $id;
//                $com->comment = $_REQUEST[''];
//                $com->save();
//                $comments = Comment::where('company_id', '=', $id)->get();
//            }
//            return view('newDesign.company.comments',['comments' => $comments, 'company' =>$company]);
//        }

    }

    public function updateComments($id, Request $request){
        $comments = Comment::where('company_id', '=', $id)->get();
        $company = Company::find($id);
        //dd($request->all());
        return view('newDesign.company.comments',['comments' => $comments, 'company' =>$company]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($company, Request $request)
    {
        $company = Company::find($company);
        $id = $company->id;
        //$comments = $company->comments;
        $comments = Comment::where('company_id', '=', $id)->latest('created_at')->simplePaginate(5);
        $links = str_replace('/?', '?', $comments->render());
        //dd($links);
        if ($request->ajax()) {
            return view('newDesign.company.comments', ['comments' => $comments, 'company' =>$company, 'links'=>$links])->render();
        }
        //dd($comments);
        return view('newDesign.company.comments', ['comments' => $comments, 'company' =>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'comment' => 'required|min:3|max:2000',
        ]);
//        dd('d');
        $company = Company::find($id);
        $comment = $company->comments()->create([
            'comment' => $request->comment,
            'user_id' => Auth::User()->id
        ]);

        $comment->save();
        Session::flash('success', 'Comment was added');

        return redirect(route('company.response.index',['company' => $company]));
//        return view('newDesign.company.comments',['company' => $company]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

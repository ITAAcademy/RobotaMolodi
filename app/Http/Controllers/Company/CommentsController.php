<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use View;
use Input;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($company, Request $request)
    {
        if(auth()->user()){
            $company = Company::find($company);
            $id = $company->id;

            $comments = Comment::where('company_id', '=', $id)->latest('created_at')->simplePaginate(5);
            $links = str_replace('/?', '?', $comments->render());

            if ($request->ajax()) {
                return view('newDesign.company.comments', ['comments' => $comments, 'company' =>$company, 'links'=>$links])->render();
            }

            return view('newDesign.company.comments', ['comments' => $comments, 'company' =>$company]);
        }else{
            return "Ви не зареєстровані";
        }
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

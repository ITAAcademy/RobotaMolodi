<?php

namespace App\Http\Controllers\Vacancy;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\User;
use App\Models\Company;
use App\Models\Vacancy;
use Mail;

class ResponseController extends Controller
{
    public function link($id, Guard $auth, Request $request){
        //dd($id);
        $this->validate($request,[
            'link' => 'url|required'
        ]);

        $link = $request->link;
        $user = User::find($auth->user()->getAuthIdentifier());
        $company = Company::find(Vacancy::find(($id))->company_id);
        Mail::send('emails.vacancyLink', ['user' => $user, 'link' => $link], function ($message) use($id){
            $company = Company::find(Vacancy::find($id)->company_id);
            $to = User::find($company->users_id)->email;
            $message->to($to, User::find($company->users_id)->name)->subject('Резюме по вакансії '.Vacancy::find($id)->position);
        });
        return view('vacancy/vacancyAnswer');
    }
}

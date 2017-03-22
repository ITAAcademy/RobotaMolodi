<?php

namespace App\Http\Controllers\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\User;
use App\Models\Company;
use App\Models\Vacancy;
use App\Models\Resume;
use App\Http\Controllers\UploadFile;
use Mail;
use View;
use Illuminate\Support\Facades\File;


class ResponseController extends Controller
{
    public function link($id, Guard $auth, Request $request){
        $this->validate($request,[
            'link' => 'url|required'
        ]);

        $link = $request->link;
        $user = User::find($auth->user()->getAuthIdentifier());
        //$company = Company::find(Vacancy::find(($id))->company_id);
        Mail::send('emails.vacancyLink', ['user' => $user, 'link' => $link], function ($message) use($id){
            $vacancy = Vacancy::find($id);
            $company = Company::find($vacancy->company_id);
            $user = User::find($company->users_id);
            $to = $user->email;
            $message->to($to, $user->name)->subject('Резюме по вакансії '.$vacancy->position);
        });
        return view('vacancy/vacancyAnswer');
    }

    public function sendFile($id, Guard $auth, Request $request)
    {
        $user = User::find($auth->user()->getAuthIdentifier());

       $uploadFile = UploadFile::upFile();

        if($uploadFile==null){
            $error = 'Необхiдний формат файлу: doc, docx, odt, rtf, txt, pdf розмiром до 2 мб.';
            return View::make('errors.uploadFileError', array(
                'error' => $error
            ));
        }
        Mail::send('emails.vacancyFile', ['user' => $user, 'file' =>$uploadFile], function ($message) use ($uploadFile, $id){
            $vacancy = Vacancy::find($id);
            $company = Company::find($vacancy->company_id);
            $user = User::find($company->users_id);
            $to = $user->email;
            $message->to($to, $user->name)->subject('Резюме по вакансії '.$vacancy->position);

            $message->attach($uploadFile);
        });
        File::delete($uploadFile);
        return view('vacancy/vacancyAnswer');

    }
    public function sendResume($id, Guard $auth, Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'resumeId' => 'required'
        ]);

        $user = User::find($auth->user()->getAuthIdentifier());
        $resume = Resume::find($id);
        Mail::send('emails.vacancyResume', ['user' => $user, 'resume' => $resume], function ($message) use($id){
            $vacancy = Vacancy::find($id);
            $company = Company::find($vacancy->company_id);
            $user = User::find($company->users_id);
            $to = $user->email;
            $message->to($to, $user->name)->subject('Резюме по вакансії '.$vacancy->position);
        });
        return view('vacancy/vacancyAnswer');
    }

}

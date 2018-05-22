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
use Auth;
use Illuminate\Support\Facades\File;


class ResponseController extends Controller
{
    public function link($id, Guard $auth, Request $request){
        $this->validate($request,[
            'link' => 'url|required'
        ]);

        $link = $request->link;
        $user = Auth::user();

        Mail::send('emails.vacancyLink', ['user' => $user, 'link' => $link], function ($message) use($id){
            $vacancy = Vacancy::find($id);
            $user = Auth::user();
            $to = $vacancy->user_email;
            $message->from($user->email, $user->name);
            $message->to($to, $vacancy->position)->subject('Резюме по вакансії '.$vacancy->position);
        });
        return view('vacancy/vacancyAnswer');
    }

    public function sendFile($id, Guard $auth, Request $request)
    {
        $user = Auth::user();
        $uploadFile = UploadFile::upFile($request);

        if($uploadFile==null){
            $error = 'Необхiдний формат файлу: doc, docx, odt, rtf, txt, pdf розмiром до 2 мб.';
            return View::make('errors.uploadFileError', array('error' => $error));
        }

        Mail::send('emails.vacancyFile', ['user' => $user, 'file' =>$uploadFile], function ($message) use ($uploadFile, $id){
            $vacancy = Vacancy::find($id);
            $user = Auth::user();
            $to = $vacancy->user_email;
            $message->from($user->email, $user->name);
            $message->to($to, $vacancy->position)->subject('Резюме по вакансії '.$vacancy->position);
            $message->attach($uploadFile);
        });

        File::delete($uploadFile);

        return view('vacancy/vacancyAnswer');
    }

    public function sendResume($id, Guard $auth, Request $request)
    {
        $this->validate($request,[
            'resumeId' => 'required'
        ]);

        $domain = $request->root();
        $idResume = $request->input('resumeId');
        $linkResume = $domain.'/'.'resume'.'/'.$idResume;
        $user = Auth::user();

        Mail::send('emails.vacancyLink', ['user' => $user, 'link' => $linkResume], function ($message) use($id){
            $vacancy = Vacancy::find($id);
            $user = Auth::user();
            $to = $vacancy->user_email;
            $message->from($user->email, $user->name);
            $message->to($to, $vacancy->position)->subject('Резюме по вакансії '.$vacancy->position);
        });

        return view('vacancy/vacancyAnswer');
    }
}

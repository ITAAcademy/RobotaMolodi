<?php namespace App\Http\Controllers\cabinet;

use App\Http\Requests;
use Request;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Industry;
use App\Models\City;
use App\Models\Company;
use App\Models\Project;
use App\Models\Vacancy;
use App\Models\Resume;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use App\Models\News;
use File;
use View;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Repositoriy\Crop;

class cabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $resumes = Auth()->user()->GetResumes;

        if (Request::ajax()) {
            return view('Resume._resume', array('resumes' => $resumes));
        } else {
            return view('Resume.myResumes')->with('resumes', $resumes);
        }
    }

    public function showMyResumes($id, Guard $auth)
    {
        $resumes = Auth()->user()->GetResumes;

        if (Request::ajax()) {
            return view('Resume._resume', array('resumes' => $resumes));
        } else {
            return view('Resume.myResumes')->with('resumes', $resumes);
        }
    }

    // show all user vacancies when add new project
    public function showAddVacancies()
    {
        $id = auth()->user()->id;
        $currentuser = User::find($id);

        $vacancies = $currentuser->ReadUserVacancies;

        return $vacancies;
    }

    public function showMyVacancies($id, Guard $auth)
    {
        $vacancies = auth()->user()->ReadUserVacancies;

        if (Request::ajax()) {
            return view('vacancy._vacancy', array("vacancies" => $vacancies));
        } else {
            return view('vacancy.myVacancies', array("vacancies" => $vacancies));
        }
    }

    public function showMyCompanies($id, Guard $auth)
    {
        $companies = auth()->user()->GetCompanies;

        if (Request::ajax()) {
            return view('Company._company', array("companies" => $companies));
        } else {
            return view('Company.myCompanies', array("companies" => $companies));
        }
    }

    public function showMyProjects()
    {
        $projects = auth()->user()->projects;

        if (Request::ajax()) {
            return view('project._projects', array("projects" => $projects));
        } else {
            return view('project.myProjects', array("projects" => $projects));
        }
    }
}

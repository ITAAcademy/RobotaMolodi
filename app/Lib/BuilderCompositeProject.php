<?php

namespace App\Lib;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\ProjectMember;
use App\Models\ProjectVacancy;
use App\Models\ProjectVacancyGroup;
use App\Models\ProjectVacancyOption;
use App\Models\Industry;
use App\Lib\CompositeProject;
//use App\Lib\BuilderCompositeProject;
use App\Lib\Leaf;

class BuilderCompositeProject
{
    public function buildEmpty()
    {
        $project = new Project();

        $root    = new CompositeProject($project);
        $members = collect();
        $member = new ProjectMember();
        $leaf   = new Leaf($member);
        $members->push($leaf);

        $vacancies = collect();
        $vacancy = new ProjectVacancy();
        $vacancyRoot = new CompositeProject($vacancy);
        $colectOptions = collect();
            foreach($vacancy->getGroup() as $key => $value){
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $value
                ]));
                $option = new ProjectVacancyOption(['value' => '']);
                $c->add('values', collect([new Leaf($option)]));
                $colectOptions->push($c);
            }
        $vacancyRoot->add('options', $colectOptions);
        $vacancies->push($vacancyRoot);

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);
        return $root;
    }
    public function buildSpecific(Project $project)
    {
        $root    = new CompositeProject($project);
        $membersRaw = $project->members;
        $members = collect();
        foreach($membersRaw as $m)
            $members->push(new Leaf($m));

        $vacanciesRaw = $project->vacancies;
        $vacancies = collect();
        foreach($vacanciesRaw as $vacancy){
            $vacancyRoot = new CompositeProject($vacancy);
            $colectOptions = collect();
            foreach($vacancy->getGroup() as $key => $value){
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $value
                ]));
                $o = collect();
                $optionsRaw = $vacancy->getOptions($key);
                foreach($optionsRaw as $opt){
                    $o->push(new Leaf($opt));
                }
                $c->add('values', $o);
                $colectOptions->push($c);
            }
            $vacancyRoot->add('options', $colectOptions);
            $vacancies->push($vacancyRoot);
        }

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);
        return $root;
    }

    public function buildStore(Request $request)
    {
        $querySavingPhoto = collect();
        $project = new Project($request->all());
        $root    = new CompositeProject($project);
        if($request['logo'])
            $root->addQuerySavingPhoto([
                'model' => $project,
                'photo' => $request['logo'],
                'field' => 'logo',
                'subPath' => ''
            ]);

        $members = collect();
        $membersHash = $request['members'];

        foreach($membersHash as $memberHash){
            $m = new ProjectMember($memberHash);
            if($memberHash['avatar'])
                $root->addQuerySavingPhoto([
                    'model' => $m,
                    'photo' => $memberHash['avatar'],
                    'field' => 'avatar',
                    'subPath' => 'team'
                ]);
            $members->push(new Leaf($m));
        }

        $vacancies = collect();
        $vacanciesHash = $request['vacancies'];
        foreach($vacanciesHash as $vacancyHash){
            $vacancy = new ProjectVacancy($vacancyHash);
            $vacancyRoot = new CompositeProject($vacancy);
            $colectOptions = collect();

            foreach($vacancyHash['options'] as $key => $optionsHash)
            {
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $vacancy->getGroup($key)
                ]));
                $o = collect();
                foreach($optionsHash as $optHash){
                    $pvo = new ProjectVacancyOption($optHash);
                    $pvo->group_id = $key;
                    $o->push(new Leaf($pvo));
                }
                $c->add('values', $o);
                $colectOptions->push($c);
            }
            $vacancyRoot->add('options', $colectOptions);
            $vacancies->push($vacancyRoot);
        }

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);
        return $root;

    }
    public function buildUpdate(Request $request, Project $project)
    {
        $queryDelete = collect();
        $project->fill($request->all());
        $root    = new CompositeProject($project);
        if($request['logo'])
            $root->addQuerySavingPhoto([
                'model' => $project,
                'photo' => $request['logo'],
                'field' => 'logo',
                'subPath' => ''
            ]);
        $members = collect();
        $membersHash = $request['members'];

        foreach($membersHash as $memberHash){
            $m = null;
            if(is_numeric($memberHash['id']))
            {
                $m = ProjectMember::find($memberHash['id']);
                if($m)
                {
                    if($m->project_id == $project->id)
                    {
                        if($memberHash['destroy'] == true)
                        {
                            $root->addQueryDelete($m);
                            continue;
                        } else {
                            $m->fill($memberHash);
                            if($memberHash['avatar'])
                                $root->addQuerySavingPhoto([
                                    'model' => $m,
                                    'photo' => $memberHash['avatar'],
                                    'field' => 'avatar',
                                    'subPath' => 'team'
                                ]);
                        }
                    }
                }
            } else {
                $m = new ProjectMember($memberHash);
                if($memberHash['avatar'])
                    $root->addQuerySavingPhoto([
                        'model'   => $m,
                        'photo'   => $memberHash['avatar'],
                        'field'   => 'avatar',
                        'subPath' => 'team'
                    ]);
            }
            $members->push(new Leaf($m));
        }

        $vacancies = collect();
        $vacanciesHash = $request['vacancies'];
        foreach($vacanciesHash as $vacancyHash){
            $vacancy = null;
            if(is_numeric($vacancyHash['id']))
            {
                $vacancy = ProjectVacancy::find($vacancyHash['id']);
                if($vacancy)
                {
                    if($vacancy->project_id == $project->id)
                    {
                        if($vacancyHash['destroy'] == true)
                        {
                            $root->addQueryDelete($vacancy);
                            continue;
                        }
                        $vacancy->fill($vacancyHash);
                    }
                }
            } else {
                $vacancy = new ProjectVacancy($vacancyHash);
            }

            $vacancyRoot = new CompositeProject($vacancy);
            $colectOptions = collect();

            foreach($vacancyHash['options'] as $key => $optionsHash)
            {
                $c = new CompositeProject(new ProjectVacancyGroup([
                    'groupId' => $key,
                    'name'    => $vacancy->getGroup($key)
                ]));
                $o = collect();
                foreach($optionsHash as $optHash){
                    $pvo = null;
                    if(is_numeric($optHash['id']))
                    {
                        $pvo = ProjectVacancyOption::find($optHash['id']);
                        if($pvo)
                        {
                            if($pvo->vacancy_id == $vacancy->id)
                            {
                                if($optHash['destroy'] == true)
                                {
                                    $vacancyRoot->addQueryDelete($pvo);
                                    continue;
                                }
                                $pvo->fill($optHash);
                            }
                        }
                    } else {
                        $pvo = new ProjectVacancyOption($optHash);
                    }
                    $pvo->group_id = $key;
                    $o->push(new Leaf($pvo));
                }
                $c->add('values', $o);
                $colectOptions->push($c);
            }
            $vacancyRoot->add('options', $colectOptions);
            $vacancies->push($vacancyRoot);
        }

        $root->add('members', $members);
        $root->add('vacancies', $vacancies);
        return $root;
    }
}

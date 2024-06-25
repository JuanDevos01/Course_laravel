<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\JobModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobModel::with('employer')->latest()->paginate(5);
        return view('jobs/index', [
            'jobs' => $jobs
        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }


    public function show(JobModel $job)
    // public function show($id)
    {
        // $job = App\Models\JobModel::find($id);
        return view('jobs.show', ['job' => $job]);
    }


    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        $job = JobModel::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );
        return redirect('/jobs');
    }

    public function edit($id)
    {
        //Esto esta en el AppServiceProvider
        // Gate::define('edit-job', function(User $user, JobModel $job){
        //     return $job->employer->user->is($user);
        // });
        // if(Auth::guest()){
        //     return redirect('/login');
        // }

        $job = JobModel::find($id);
        
        Gate::authorize('edit-job', $job);        
        return view('jobs.edit', ['job' => $job]);
    }

    public function update($id)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        //autorize
        $job = JobModel::findOrFail($id);
        Gate::authorize('edit-job', $job);    

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect('/jobs/' . $job->id);
    }


    public function destroy(JobModel $job)
    {
        Gate::authorize('edit-job', $job);    
        $job->delete();
        return redirect('/jobs');
    }
}

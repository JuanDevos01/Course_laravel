<?php

namespace App\Http\Controllers;

use App\Models\JobModel;
use Illuminate\Http\Request;

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
        JobModel::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect('/jobs');
    }

    public function edit($id)
    {
        $job = JobModel::find($id);
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

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect('/jobs/' . $job->id);
    }


    public function destroy(JobModel $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}

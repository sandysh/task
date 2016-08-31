<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Project;

use App\Task;

use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projectID)
    {
        $today =  Carbon::today();
        return $task = Task::where('project_id',$projectID)
                        ->whereDate('created_at','=',$today)
                        ->where('user_id','=',auth()->user()->id)
                        ->orderBy('id','desc')
                        ->get();
    }

    public function yesterdayTask($projectID)
    {
        $yesterday =  Carbon::yesterday();
        return $task = Task::where('project_id',$projectID)
                        ->whereDate('created_at','=',$yesterday)
                        ->where('user_id','=',auth()->user()->id)
                        ->where('status','=',0)
                        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try
        {
        $task = Task::firstOrCreate([
            'name'=>$request->task,
            'user_id'=>auth()->user()->id,
            'project_id'=>$id
            ]);
        return "true";
        }
        catch(Exception $e)
        {
            return 'false';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function taskComplete($id)
    {
        $task = Task::find($id);
        $task->status = 1;
        $task->save();
        if($task)
        {
            return "true";
        }
        else
        {
            return "Task could not be completed, please try again later";
        }
    }

    public function uncheckTask($id)
    {
        $task = Task::find($id);
        $task->status = 0;
        $task->save();
        if($task)
        {
            return "true";
        }
        else
        {
            return "Task could not be completed, please try again later";
        }
    }

    public function start($id)
    {
        $task = Task::find($id);
        $task->start = Carbon::now();
        $task->save();
        if($task)
        {
            return "true";
        }
        else
        {
            return "Could not start timer, please try again later";
        }
    }

    public function pause($id)
    {
        $task = Task::find($id);
        $task->pause = Carbon::now();
        $task->save();
        if($task)
        {
            return "true";
        }
        else
        {
            return "Could not start timer, please try again later";
        }
    }

    public function resume($id)
    {
        $task = Task::find($id);
        $task->resume = Carbon::now();
        $task->save();
        if($task)
        {
            return "true";
        }
        else
        {
            return "Could not start timer, please try again later";
        }
    }


    public function stop($id)
    {
        $task = Task::find($id);
        $task->stop = Carbon::now();
        $task->save();
        if($task)
        {
            return "true";
        }
        else
        {
            return "Could not stop timer, please try again later";
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id)->delete();
        if($task)
        {
            return "true";            
        }
        else
        {
            return "Some error occured, Please try again later";
        }
    }
}

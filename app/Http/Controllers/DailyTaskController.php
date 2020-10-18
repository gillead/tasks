<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class DailyTaskController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daily_tasks = DailyTask::orderBy('id', 'desc')
            ->paginate(10);
        return view('daily_tasks.index')->with('daily_tasks', $daily_tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daily_tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $daily_task = new DailyTask([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);
        $daily_task->save();
        return redirect('/daily_tasks')->with('success', 'Ежедневная задача создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $daily_task = DailyTask::findOrFail($id);

        return view('daily_tasks.show')->withTask($daily_task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $daily_task = DailyTask::findOrFail($id);

        return view('daily_tasks.edit')->withTask($daily_task);
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
        $this->validate($request, [
            'title' => 'required'
        ]);

        $daily_task = DailyTask::find($id);
        $daily_task->title = $request->get('title');
        $daily_task->description = $request->get('description');

        $daily_task->update();
        return redirect('/daily_tasks')->with('success', 'Задача отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DailyTask::destroy($id)) {
            return redirect('/daily_tasks')->with('success', 'Ежедневная задача удалена!');
        } else {
            return redirect('/daily_tasks')->with('error', 'Пожалуйста попробуйте ещё раз');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class TaskController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('status', '!=', 1)
            ->orderBy('priority', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('tasks.index')->with('tasks', $tasks);
    }

    public function archive()
    {
        $tasks = Task::where('status', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('tasks.archive')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required'
        ]);

        $task = new Task([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => $request->get('status') ? true : false,
            'comment' => $request->get('comment'),
            'priority' => $request->get('priority'),
            'start' => $request->get('start'),
            'end' => $request->get('end')
        ]);
        $task->save();
        return redirect('/tasks')->with('success', 'Задача создана!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.show')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit')->withTask($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'start' => 'required',
        ]);

        $task = Task::find($id);
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->status = $request->get('status') ? true : false;
        $task->comment = $request->get('comment');
        $task->priority = $request->get('priority');
        $task->start = $request->get('start');
        $task->end = $request->get('end');

        $task->update();
        return redirect('/tasks')->with('success', 'Задача отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Task::destroy($id)) {
            return redirect('/tasks')->with('success', 'Задача удалена!');
        } else {
            return redirect('/tasks')->with('error', 'Пожалуйста попробуйте ещё раз');
        }
    }
}

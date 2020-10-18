<?php

namespace App\Http\Controllers;

use App\Models\DailyTask;
use App\Models\DailyTaskStat;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class DailyTaskStatController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @param $date
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sdate = $request->get('sdate');
        $dates = DailyTaskStat::select('date')
            ->distinct()
            ->get();
        if ($sdate == null) {
            $sdate = $dates[0]->date;
        }
        $stats = DailyTaskStat::orderBy('date', 'desc')
            ->where('date', '=', $sdate)
            ->paginate(10);

        $successTaskIds = array_map(function ($item) {
            return $item->task_id;
        }, $stats->items());

        $failedDailyTasks = DailyTask::whereNotIn('id', $successTaskIds)
            ->get();

        return view('daily_task_stats.index', [
            'stats' => $stats,
            'dates' => $dates,
            'sdate' => $sdate,
            'failedDailyTasks' => $failedDailyTasks
        ]);
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
            'task_id' => 'required',
            'date' => 'required'
        ]);

        $daily_task_stat = new DailyTaskStat([
            'task_id' => $request->get('task_id'),
            'date' => $request->get('date')
        ]);
        $daily_task_stat->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DailyTaskStat::destroy($id)) {
            return back()->with('success', 'Статистика удалена!');
        } else {
            return back()->with('error', 'Пожалуйста попробуйте ещё раз');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ArterialPressure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ArterialPressureController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arterial_pressures = ArterialPressure::orderBy('id', 'desc')
            ->paginate(10);
        return view('arterial_pressures.index')->with('arterial_pressures', $arterial_pressures);
    }

    public function archive()
    {
        $arterial_pressures = ArterialPressure::where('status', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('arterial_pressures.archive')->with('arterial_pressures', $arterial_pressures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arterial_pressures.create');
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
            'date' => 'required',
            'time' => 'required',
            'value1' => 'required',
            'value2' => 'required',
            'pulse' => 'required'
        ]);

        $arterial_pressure = new ArterialPressure([
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'value1' => $request->get('value1'),
            'value2' => $request->get('value2'),
            'pulse' => $request->get('pulse'),
            'comment' => $request->get('comment')
        ]);
        $arterial_pressure->save();
        return redirect('/arterial_pressures')->with('success', 'АД создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arterial_pressure = ArterialPressure::findOrFail($id);

        return view('arterial_pressures.show')->with('arterial_pressure', $arterial_pressure);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arterial_pressure = ArterialPressure::findOrFail($id);

        return view('arterial_pressures.edit')->with('arterial_pressure', $arterial_pressure);
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
            'date' => 'required',
            'time' => 'required',
            'value1' => 'required',
            'value2' => 'required',
            'pulse' => 'required'
        ]);

        $arterial_pressure = ArterialPressure::find($id);
        $arterial_pressure->date = $request->get('date');
        $arterial_pressure->time = $request->get('time');
        $arterial_pressure->value1 = $request->get('value1');
        $arterial_pressure->value2 = $request->get('value2');
        $arterial_pressure->pulse = $request->get('pulse');
        $arterial_pressure->comment = $request->get('comment');

        $arterial_pressure->update();
        return redirect('/arterial_pressures')->with('success', 'АД отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (ArterialPressure::destroy($id)) {
            return redirect('/arterial_pressures')->with('success', 'АД удалён!');
        } else {
            return redirect('/arterial_pressures')->with('error', 'Пожалуйста попробуйте ещё раз');
        }
    }
}

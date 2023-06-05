<?php

namespace App\Http\Controllers;
USE App\Models\Event;
use Illuminate\Http\Request;


class FullCalenderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cronograma|crear-cronograma|editar-cronograma|borrar-cronograma')->only('index');
        $this->middleware('permission:crear-cronograma', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cronograma', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cronograma', ['only' => ['destroy']]);
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('/fullcalender');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}

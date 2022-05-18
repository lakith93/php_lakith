<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRepresentativeStoreRequest;
use App\Models\Route;
use App\Models\RouteAllocation;
use App\Models\SalesRepresentative;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesRepresentativeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reps = SalesRepresentative::with('route')->where('manager_id', Auth::user()->id)->get();
        return view('salesrep.index', compact('reps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = Route::where('status', 1)->get();
        $repCount = SalesRepresentative::count();

        if (!$repCount) {
            $repNumber = 1;
        } else {
            $number = 1;
            $repNumber = $repCount + $number;
        }
        return view('salesrep.create', compact('routes', 'repNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesRepresentativeStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $rep = SalesRepresentative::create([
                'route_id' => $request->route_id,
                'manager_id' => Auth::user()->id,
                'name' => $request->name,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'joined_date' => $request->joined_date,
                'comments' => $request->comments
            ]);

            RouteAllocation::create([
                'sales_manager_id' => Auth::user()->id,
                'sales_rep_id' => $rep->id,
                'route_id' => $request->route_id,
                'start_date' => Carbon::now(),
//                'end_date' => "2022-05-18 12:00:00",
                'end_date' => Carbon::createFromFormat('Y-m-d H:i:s', '9999-12-31 23:59:59')->toDateTimeString(),
                'status' => 1
            ]);


            DB::commit();
            return redirect()->route('sales-rep.index')->with('success', 'Sales Representative successfully created!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('sales-rep.index')->with('error', 'Failed!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rep = SalesRepresentative::with('route')->where('id', $id)->get();
        return $rep;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rep = SalesRepresentative::findOrFail($id);
        $routes = Route::where('status', 1)->get();
        return view('salesrep.edit', compact('rep', 'routes'));
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

        DB::beginTransaction();
        try {
            $rep = SalesRepresentative::findOrFail($id);
            $lastRouteAllocation = RouteAllocation::where(['sales_manager_id' => Auth::user()->id, 'sales_rep_id' => $rep->id, 'route_id' => $rep->route_id])->latest()->first();

            $rep->route_id = $request->route_id;
            $rep->name = $request->name;
            $rep->email = $request->email;
            $rep->telephone = $request->telephone;
            $rep->joined_date = $request->joined_date;
            $rep->comments = $request->comments;
            $rep->save();


            RouteAllocation::where(['id' => $lastRouteAllocation->id])->update(['status' => 0, 'end_date' => Carbon::now()]);

            RouteAllocation::create([
                'sales_manager_id' => Auth::user()->id,
                'sales_rep_id' => $id,
                'route_id' => $request->route_id,
                'start_date' => Carbon::now(),
                'end_date' => Carbon::createFromFormat('Y-m-d H:i:s', '9999-12-31 23:59:59')->toDateTimeString(),
                'status' => 1
            ]);

            DB::commit();
            return redirect()->route('sales-rep.index')->with('success', 'Sales Representative successfully updated!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('sales-rep.index')->with('error', 'Failed!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rep = SalesRepresentative::findOrFail($id);
        $rep->delete();
        return redirect()->route('sales-rep.index')->with('success', 'Record successfully deleted!');
    }
}

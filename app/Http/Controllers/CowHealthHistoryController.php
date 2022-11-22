<?php

namespace App\Http\Controllers;

use App\Models\CowHealthHistory;
use App\Models\Drug;
use App\Models\Drughistory;
use App\Models\Farm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CowHealthHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farm = Farm::all();
        $from_date = Carbon::now()->startOfMonth()->format('Y-m-d');
        $to_date = Carbon::now()->endOfMonth()->format('Y-m-d');

        return view('healthfarm.index', compact('farm', 'from_date', 'to_date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(Request $request)
    {
        $healthfarm = DB::table('cow_health_histories')
            ->selectRaw('cow_health_histories.*,farms.nis as cow_name')
            ->join('farms', 'farms.id', '=', 'cow_health_histories.farm_id');

        if ($request->from_date) {
            $healthfarm->whereDate('cow_health_histories.tanggal', '>=', Carbon::parse($request->from_date));
        }

        if ($request->to_date) {
            $healthfarm->whereDate('cow_health_histories.tanggal', '<=', Carbon::parse($request->to_date));
        }

        if ($request->farm_id) {
            $healthfarm->where('cow_health_histories.farm_id', $request->farm_id);
        }

        return datatables($healthfarm)
            ->addIndexColumn()
            ->editColumn('cow_name', function ($c) {
                return $c->cow_name;
            })
            ->editColumn('tanggal', function ($d) {
                $formatedDate = Carbon::createFromFormat('Y-m-d', $d->tanggal)->format('d-m-Y');
                return $formatedDate;
            })
            ->addColumn('options', function ($row) {
                $act['edit'] = route('healthfarm.edit', ['healthfarm' => $row->id]);
                $act['data'] = $row;

                return view('healthfarm.options', $act)->render();
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $farm = Farm::all();
        $drug = Drug::all();
        $healthfarm = CowHealthHistory::all();
        return view('healthfarm.create', compact('farm', 'healthfarm', 'drug'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'farm_id' => 'required',
                    'tanggal' => 'required|date',
                    'keterangan' => 'required|string'
                ],
                [],
            );

            $healthfarm = new CowHealthHistory;
            $healthfarm->farm_id = $request->farm_id;
            $healthfarm->tanggal = $request->tanggal;
            $healthfarm->keterangan = $request->keterangan;
            $healthfarm->save();


            $farm = Farm::find($request->farm_id);
            $farm->kondisi = 'Sakit';
            // $farm->keterangan = $
            $farm->save();

            $drug_id = [];
            $jumlah = [];
            $arr = [];

            if ($request->drug_id) {
                foreach ($request->drug_id as $key => $value) {
                    $drug_id[] = $value;
                }
            }

            if ($request->jumlah) {
                foreach ($request->jumlah as $key => $value) {
                    $jumlah[] = $value;
                }
            }

            foreach ($drug_id as $key => $value) {
                $arr[$key]['drug_id'] = $value;
                $arr[$key]['keluar'] = $jumlah[$key];
                $arr[$key]['user_id'] = Auth::id();
                $arr[$key]['cowhealth_id'] = $healthfarm->id;
                $arr[$key]['tanggal'] = $request->tanggal;
                $arr[$key]['masuk'] = 0;
            }
            // dd($arr);

            foreach ($arr as $key => $value) {
                Drughistory::create($value);
            }

            // $hisdrug = new Drughistory;
            // $hisdrug->user_id = Auth::id();
            // foreach ($arr['drug_id'] as $key => $value) {
            //     $hisdrug->drug_id = $value;
            // }
            // $hisdrug->cowhealth_id = $healthfarm->id;
            // $hisdrug->tanggal = $request->tanggal;
            // $hisdrug->masuk = 0;
            // foreach ($arr['jumlah'] as $key => $value) {
            //     $hisdrug->keluar = $value;
            // }
            // $hisdrug->save();


            // $drug = Drug::select('id')->where('id', $request->drug_id)->first();
            // $valueMasuk = Drughistory::where('drughistories.drug_id', '=', $drug->id)->sum('masuk');
            // $valueKeluar = Drughistory::where('drughistories.drug_id', '=', $drug->id)->sum('keluar');

            // $drug->update(['stok_akhir' => $valueMasuk - $valueKeluar]);
            // $drug->save();

            return redirect()->route('healthfarm.index')->with(['message' => 'Data berhasil di simpan.']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('healthfarm.index')->with(['error' => 'Data gagal di simpan.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CowHealthHistory  $cowHealthHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CowHealthHistory $cowHealthHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CowHealthHistory  $cowHealthHistory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farm = Farm::all();
        $drug = Drug::all();
        $healthfarm = CowHealthHistory::find($id);
        return view('healthfarm.edit', compact('farm', 'healthfarm', 'drug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CowHealthHistory  $cowHealthHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate(
                [
                    'farm_id' => 'required',
                    'tanggal' => 'required|date',
                    'keterangan' => 'required|string'
                ],
                [],


            );

            $healthfarm = CowHealthHistory::find($id);
            $healthfarm->farm_id = $request->farm_id;
            $healthfarm->tanggal = $request->tanggal;
            $healthfarm->keterangan = $request->keterangan;
            $healthfarm->save();

            return redirect()->route('healthfarm.index')->with(['message' => 'Data berhasil diperbarui']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('healthfarm.index')->with(['error' => 'Data gagal diperbarui']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CowHealthHistory  $cowHealthHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $healthfarm = CowHealthHistory::find($id);
        if ($healthfarm->drugHistories()->exists()) {
            return redirect()->route('healthfarm.index')->with(['error' => 'Data gagal dihapus.']);
        }
        $healthfarm->delete();
        return redirect()->route('healthfarm.index')->with(['message' => 'Data berhasil dihapus.']);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rkatModel;

class RKATController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response()->json([
            'data' => rkatModel::join('user', 'rkat.id_user', 'user.id_user')
            ->join('struktur_child1', 'user.id_struktur_child1', 'struktur_child1.id_struktur_child1')
            ->select('rkat.*', "struktur_child1.nama_struktur_child1")
            ->get()
        ]);
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
            "id_user" => "required|numeric",
            "kode_rkat" => "required",
            "sasaran_strategi" => "required",
            "indikator_sasaran_strategi" => "required",
            "nama_program" => "required",
            "program_kerja" => "required",
            "deskripsi" => "required",
            "tujuan" => "required",
            "mulai_program" => "required",
            "selesai_program" => "required",
            "tempat" => "required",
            "sumber_anggaran" => "required",
            "rencara_anggaran" => "required",
            "total_anggaran" => "required"
        ]);

        $data = rkatModel::create($request->all());

        return response()->json([
            'data' => $data ? "Success data was added" : "Failed add data"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $params
     * @return \Illuminate\Http\Response
     */
    public function show($params)
    {
        $data = rkatModel::find($params);

        return response()->json([
            'data' => $data ? $data : "Failed, data not found"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $params
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $params)
    {
        // $this->validation($request);

        $data = rkatModel::find($params)->update($request->all());

        return response()->json([
            'data' => $data ? "Data was updated" : "Failed to update data"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $params
     * @return \Illuminate\Http\Response
     */
    public function destroy($params)
    {
        $data = rkatModel::find($params);
        if ($data) {
            $data->delete();
        }

        return response()->json([
            'data' => $data ? "Success delete data" : "Failed, data not found"
        ]);
    }
}
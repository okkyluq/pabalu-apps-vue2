<?php

namespace Modules\Satuan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Modules\Satuan\Entities\Satuan;
use Modules\Satuan\Transformers\SatuanResource;
use Modules\Satuan\Http\Requests\SatuanRequest;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::with(['createdBy'])->orderBy('created_at', 'desc')->paginate(10);
        return SatuanResource::collection($satuan);
    }

    public function store(SatuanRequest $request)
    {
        try {
            DB::beginTransaction();
            $satuan = Satuan::create([
                'satuan' => $request->satuan,
                'keterangan' => $request->keterangan,
                'created_by' => 1,
            ]);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => new SatuanResource($satuan),
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e, 400);
        }

    }


    public function show($id)
    {
        try {
            DB::beginTransaction();
            $satuan = Satuan::findOrFail($id);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => new SatuanResource($satuan),
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e, 400);
        }
    }


    public function edit($id)
    {
        try {
            DB::beginTransaction();
            $satuan = Satuan::findOrFail($id);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => new SatuanResource($satuan),
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e, 400);
        }
    }


    public function update(SatuanRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $satuan = Satuan::findOrFail($id);
            $satuan->satuan = $request->satuan;
            $satuan->keterangan = $request->keterangan;
            $satuan->save();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => new SatuanResource($satuan),
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e, 400);
        }
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $satuan = Satuan::findOrFail($id);
            $satuan->delete();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => new SatuanResource($satuan),
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e, 400);
        }
    }
}

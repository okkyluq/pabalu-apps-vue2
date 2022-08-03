<?php

namespace Modules\Kategori\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Kategori\Entities\Kategori;
use Modules\Kategori\Transformers\KategoriResource;
use Modules\Kategori\Http\Requests\KategoriRequest;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::select(['id', 'kategori', 'keterangan', 'created_by'])->paginate(10)->onEachSide(1);
        return KategoriResource::collection($kategori);
    }

    public function store(KategoriRequest $request)
    {
        return response()->json($request->all());
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}

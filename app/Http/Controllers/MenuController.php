<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestDataMenu;
use Spatie\Permission\Models\Permission;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Resources\MenuResource;

class MenuController extends Controller
{

    public function index(Request $request)
    {
        $menu = Menu::with(['childs', 'createdBy'])->orderBy('created_at', 'desc')->paginate(10);
        return MenuResource::collection($menu);
    }

    public function store(RequestDataMenu $request)
    {
        try {
            DB::beginTransaction();

            $menu = Menu::create([
                'parent_id' => $request->parent_menu,
                'text_menu' => $request->text_menu,
                'url' => $request->url_menu ?? "#",
                'active' => $request->status_menu,
                'icon' => $request->icon,
                'created_by' => Auth::user()->id,
            ]);

            $menu->otoritas_menu()->create([
                'view' => $request->otoritas['view'],
                'create' => $request->otoritas['create'],
                'edit' => $request->otoritas['edit'],
                'delete' => $request->otoritas['delete'],
                'export' => $request->otoritas['export'],
                'import' => $request->otoritas['import']
            ]);

            $otoritas_modul = collect($request->otoritas)->filter(function($value, $key){ return $value === 'true';})->keys();
            $new_otoritas_modul = $otoritas_modul->map(function($isi) use ($request){ return $isi.'_'.Str::slug($request->text_menu, '_'); });

            foreach ($new_otoritas_modul as $isi) {
                Permission::updateOrCreate(['name' => $isi]);
            }

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message1' => $otoritas_modul,
                'message2' => $new_otoritas_modul,
            ], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e, 400);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function getMenu(Request $request)
    {
        $data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = Menu::where('text_menu', 'LIKE', '%'.$search.'%')
                        ->where('active', 'true')
                        ->get();
        }
        return response()->json($data);
    }

    public function getMenuUser()
    {
        $menu = Menu::with(['childs' => function($query){
                    $query->select(['id', 'parent_id', 'text_menu', 'url', 'icon'])
                    ->where('active', 'true');
                }])
                ->select(['id', 'parent_id', 'text_menu', 'url', 'icon'])
                ->where('parent_id', null)
                ->where('active', 'true')
                ->get();
        return response()->json($menu);
    }

    public function getAllMenu()
    {
        $menu = Menu::with(['otoritas_menu', 'childs' => function($query){
            $query->with(['otoritas_menu'])->select(['id', 'parent_id', 'text_menu', 'url', 'icon'])
            ->where('active', 'true');
        }])
        ->select(['id', 'parent_id', 'text_menu', 'url', 'icon'])
        ->where('parent_id', null)
        ->where('active', 'true')
        ->get();

        $all_permision = Permission::all();

        return response()->json([
            'success' => true,
            'data_menu' => $menu,
            'data_all_permision' => $all_permision
        ], 200);
    }
}

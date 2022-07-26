<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class OtoritasMenuController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
        try {
            $role = Role::find($id);
            $otoritas_menu = collect($request->otoritas)->filter(function($value, $key){ return $value === true;})->keys();
            $role->syncPermissions($otoritas_menu);

            return response()->json([
                'success' => true,
                'data' => $otoritas_menu,
                'message' => 'Otoritas berhasil diperbarui, Silahkan refresh halaman agar menu tampil !'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }


    public function destroy($id)
    {
        //
    }

    public function getRole(Request $request)
    {
        try {
            $role = Role::all();
            return response()->json([
                'success' => true,
                'data' => $role
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }

    }

    public function getOtoritasRole(Request $request)
    {

        try {
            $list_role = Role::find($request->role_id);
            return response()->json([
                'success' => true,
                'data' => $list_role->getAllPermissions()
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }
}

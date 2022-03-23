<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Desa\Rt;
use App\Models\Desa\Rw;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            # jika request berasal dari ajax
            $data = User::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn_1 = '<a href="' . route('user.edit', $row->id) . '" class="edit btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Lihat</a>';
                    $actionBtn = $actionBtn_1 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('user.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i> Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // RT dan RW tampilkan
        $rt = Rt::all();
        $rw = Rw::all();
        return view('user.index', compact('rt', 'rw'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users',
            'no_rt' => 'required|unique:users',
            'no_rw' => 'required',
            'role' => 'required',
            'name' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'no_rt' => $request->no_rt,
            'no_rw' => $request->no_rw,
            'password' => Hash::make($request->password),
            'status' => 1
        ]);
        return response()->json(['success' => 'Users Berhasil ditambahkan']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        if ($data->role == "admin") {
            # code...
            return response()->json(['error' => 'Admin Tidak Bisa Dihapus']);
        } else {
            # code...
            $data->delete();
            return response()->json(['success' => 'Users Berhasil dihapus']);
        }
        
    }
}

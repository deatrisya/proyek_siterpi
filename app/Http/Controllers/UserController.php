<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user'] = User::orderBy('id');
        return view('user.index', $data);
    }

    public function data(Request $request){
        $user = User::where('id', '!=', null);

        if ($request->status) {
            $user->where('status', $request->status);
        }

        return datatables($user)
            ->addIndexColumn()
            ->addColumn('options', function ($row) {
                $act['edit'] = route('user.edit', ['user' => $row->id]);
                $act['data'] = $row;

                return view('user.options', $act)->render();
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
                    'foto' => 'required',
                    'name' => 'required|string',
                    'username' => 'required|string|max:10',
                    'password' => 'min:8|nullable'
                ],[],
            );

            $user = new User;

            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = $request->password;

            if ($request->file('foto_user')){
                $image_name = $request ->file('foto_user')->store('foto_user','public');
            }
            $user -> foto = $image_name;

            $user->save();

            return redirect()->route('user.index')->with(['message' => 'Data berhasil di simpan.']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('user.index')->with(['message' => 'Data gagal di simpan.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
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
        try {
            $request->validate(
                [
                    'foto' => 'required',
                    'name' => 'required|string',
                    'username' => 'required|string|max:10',
                    'password' => 'min:8|nullable'
                ],[],
            );

            $user = new User;
            $user = User::findOrFail($id);
            if ($request->hasFile('foto')) {
                if ($user->foto && file_exists(storage_path('app/public/'.$user->foto))) {
                    Storage::delete('public/'.$user->foto);
                }
                $image_name = $request->file('foto')->store('user','public');
                $user->foto = $image_name;
            }

            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->save();


            return redirect()->route('user.index')->with(['message' => 'Data berhasil diperbarui.']);
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('user.index')->with(['message' => 'Data gagal diperbarui.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
         if ($user->drugHistory()->exists()) {
             return redirect()->route('user.index')->with(['error' => 'Data gagal dihapus.']);
         }
         if ($user->feedHistory()->exists()) {
            return redirect()->route('user.index')->with(['error' => 'Data gagal dihapus.']);
        }
        $user->delete();

        return redirect()->route('user.index')->with(['message' => 'Data berhasil dihapus.']);
    }
}

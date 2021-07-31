<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Standart;
use Illuminate\Support\Facades\DB;
use app\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Standart $standart)
    {

//        $standart = DB::table('standarts')
//            ->select(DB::raw('DATE_FORMAT(created_at,"%Y") as created_at, id, user_id, type, name'))
//            ->get();

        $standart = Standart::with(['questions'])->get();

        return view('admin.dashboard', compact('standart'));
    }


    public function pageTambahAuditee()
    {
        return view('admin.tambahAuditee');
    }


    public function pageTambahAuditor()
    {
        return view('admin.tambahAuditor');
    }

    public function dashboardAuditee()
    {
        $userAuditee = User::role('auditee')->get();

        return view('admin.dashboardAuditee', compact('userAuditee'));
    }

    public function dashboardAuditor()
    {
        $userAuditor = User::role('auditor')->get();

        return view('admin.dashboardAuditor', compact('userAuditor'));
    }

    public function tambahAuditee(Request $request)
    {
        $request->validate([
            'name'              =>      'required|string|max:30',
            'fakultas'          =>      'required|string',
            'prodi'             =>      'required|string',
            'email'             =>      'required|email|unique:users,email',
            'password'          =>      'required|alpha_num|min:6',
        ]);

//        dd($request->all());

        $user = User::create([
            'name' => ucwords($request['name']),
            'fakultas' => ucwords($request['fakultas']),
            'prodi' => ucwords($request['prodi']),
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $user->assignRole('auditee');

        if(!is_null($user)) {
            return redirect()->route('admin.dashboardAuditee')->with("success", "Berhasil Tambah");
        }
        else {
            return back()->with("error", "Proses Gagal");
        }

    }

    public function tambahAuditor(Request $request)
    {
        $request->validate([
            'name'              =>      'required|string|max:30',
            'fakultas'          =>      'required|string',
            'prodi'             =>      'required|string',
            'email'             =>      'required|email|unique:users,email',
            'password'          =>      'required|alpha_num|min:6',
        ]);

//        dd($request->all());

        $user = User::create([
            'name' => ucwords($request['name']),
            'fakultas' => $request['fakultas'],
            'prodi' => $request['prodi'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $user->assignRole('auditor');

        if(!is_null($user)) {
            return redirect()->route('admin.dashboardAuditor')->with("success", "Berhasil Tambah");
        }
        else {
            return back()->with("error", "Proses Gagal");
        }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {

        try {
            $user = User::where('id', '=', $id)->first();
            $user->password = \Hash::make('123456');
            $user->save();
            return back()->with('success','Berhasil reset password');
        } catch (\Illuminate\Database\QueryException $e) {
            abort(404);
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
        $userAuditee = User::findOrFail($id);
        $userAuditee->delete();

        return redirect()->back()->with('success','Berhasil Menghapus data');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Standart;
use Illuminate\Http\Request;

class StandartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = request()->validate([
            'type' => 'required',
            'name' => 'required',
        ]);

        $data['user_id'] = Auth()->id();

        $standart = Standart::create($data);

        if(!is_null($standart)) {
            return redirect('/standarts/' .$standart->id)->with('success', 'Berhasil tambah data');
        }
        else {
            return back()->with("error", "Proses Gagal");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Standart $standart)
    {
//        dd(request()->all());

        $data = request()->validate([
            'questions.*.question' => 'required',
        ]);


        $data['standart_id'] = $standart->id;
//        dd($data);

        $question = $standart->questions()->createMany($data['questions']);

        if(!is_null($question)) {
            return redirect()->route('admin.dashboard')->with('success', 'Berhasil tambah data');
        }
        else {
            return back()->with("error", "Proses Gagal");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Standart $standart)
    {
        return view('admin.datas.standart', compact('standart'));
    }

    public function view($id)
    {
        $standart = Standart::where('id', '=', $id)->get();
        $question = Question::where('standart_id', '=',$id)->get();

        return view('admin.datas.view', compact('standart', 'question'));
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
    public function update(Request $request ,Standart $standart)
    {

        $data = request()->validate([
            'type' => 'required',
            'name' => 'required',
        ]);

        $data['user_id'] = Auth()->id();

        $standart -> update($request->all());

        if(!is_null($standart)) {
            return redirect('/standarts/' .$standart->id. '/edit')->with('success', 'Berhasil edit standart');
        }
        else {
            return back()->with("error", "Proses Gagal");
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

        $data = Standart::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success','Berhasil Menghapus data');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\GradeStoring;
use Carbon\Carbon;
use DeepCopy\Filter\ReplaceFilter;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Response;
use App\Models\Standart;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ResponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $standarts = Standart::with('questions')
        ->where('id', '=', $id)->get();

        $likert = ["1","2","3","4"];

        $yatidak = ["Ya","Tidak"];

        return view('auditee.respons', compact('standarts','likert','yatidak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Question $question)
    {

        $data = request()->validate([
            'standart_id' => 'required',
            'question.*.question' => 'required',
            'question.*.question_id' => 'required|string',
            'user_id' => 'required',
            'typegrade' => 'required',
            'question.*.answer' => 'required',
            'files_link' => 'required | url',
            'description' => 'required',
        ]);

        $data['user_id'] = Auth()->id();

//        dd($request->input('question.*.standart_id'));

        $result=collect($request->question)->map(function ($item)use($request) {
            $item['user_id'] = $request->user_id;
            $item['standart_id'] = $request->standart_id;
            $item['files_link'] = $request->files_link;
            $item['description'] = $request->description;
            return $item;
        });

//        dd($result->toArray());

        $response=Response::insert($result->toArray());

        //grade
        $standart = $request->standart_id;

        $standarts2 = Standart::where('id', '=', $request->standart_id)->get();

        foreach ($standarts2 as $sha){
            if ($sha->type == 'Likert'){

                $ca = Question::where('standart_id', '=', $standart)->count();
                $na = array_sum($request->input('question.*.answer'));

                $ma = 4 * $ca;
                $totals2 = (int) round(($na / $ma) * 100);
            }
            else{
                $ca = Question::where('standart_id', '=', $standart)->count();
                $ta = Response::where('standart_id', '=', $standart)->where('answer', '=', 'Ya')
                    ->where('created_at','=', Carbon::now())
                    ->where('user_id', '=', $request->user_id)
                    ->count();

                $totals2 = (int) round(($ta / $ca) * 100);

            }
        }

        $grade = new GradeStoring();
        $grade->auditee_id = $request->user_id;
        $grade->standart_id = $request->standart_id;
        $grade->grade = $totals2;
        $grade->type = $request->typegrade;

        $grade->save();

        if(!is_null($response || $grade)) {
            return redirect('/auditee/dashboard')->with('success', 'Berhasil tambah data');
        }
        else {
            return back()->with("error", "Proses Gagal");
        }

//        $responses = $question->responses()->createMany($result->toArray());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}

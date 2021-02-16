<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ParameterLabel;
use App\Models\Parameter;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = ParameterLabel::all();
        return ($parameters);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $parameter = new Parameter;
            $parameter->character_id = $request->character_id;
            foreach ($request->parameters as $data) {
                $key = $data['key_name'];
                $parameter->$key = $data['value'];
            }
            $parameter->save();
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $columns = ParameterLabel::all('key_name', 'label');
        // カラムごとの平均を四捨五入し、整数型にする。
        $values = [];
        foreach ($columns as $column) {
            $value = Parameter::where('character_id', $id)
                ->selectRaw("convert(round(avg($column->key_name)),unsigned) as value")
                ->selectRaw("'$column->label' as label")
                ->groupBy('character_id')
                ->first();

            array_push($values, $value);
        }

        return ($values);

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

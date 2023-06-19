<?php

namespace App\Http\Controllers\API;
use App\models\ketinggian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;
class EdgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ketinggian::latest()->first();
        

        // Kirim respons JSON dengan data sensor
        if($data) {
            return ApiFormatter::createApi(200, 'success', $data);
        }else {
            return ApiFormatter::createApi(400, 'failed');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'id_sensor' => 'required',
                'ketinggian' => 'required',
            ]);
            $ketinggian = ketinggian::create([
                'id_sensor' => $request->id_sensor,
                'ketinggian' => $request->ketinggian
            ]);

            $data =ketinggian::where('id', '=', $ketinggian->id)->get();
            if($data) {
                return ApiFormatter::createApi(200, 'success', $data);
            }else {
                return ApiFormatter::createApi(400, 'failed');
            // if ($ketinggian) {
            //     // Berhasil menyimpan data
            //     return response()->json(['message' => 'Data berhasil disimpan'], 200);
            // } else {
            //     // Gagal menyimpan data
            //     return response()->json(['message' => 'Gagal menyimpan data'], 400);
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'failed');
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

    public function test(){
        return response()->json('test');
    }
}

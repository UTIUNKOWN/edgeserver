<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ketinggian;
class PostCloudController extends Controller
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
    public function postDataToCloud()
{
    // Mengambil data terakhir dari edge
    $dataEdge = ketinggian::whereIn('id_sensor', [1, 2])->latest()->get();

    // Mengecek apakah ada data terakhir yang berbeda dengan data yang telah dipost sebelumnya
    if ($dataEdge->count() > 0 && !$this->isDataPosted($dataEdge)) {
        // Mendapatkan data terakhir
        $lastData = $dataEdge->last();

        $data = [
            'id_sensor' => $lastData->id_sensor,
            'kapasitas' => $lastData->ketinggian
        ];

        // Kirim data ke server menggunakan permintaan POST
        $response = Http::post('http://192.168.0.145:8000/api/cloud', $data);

        // Cek status respons
        if ($response->successful()) {
            // Jika pengiriman berhasil, lakukan tindakan sesuai kebutuhan
            $this->markDataAsPosted($dataEdge); // Tandai data sebagai telah dipost agar tidak dikirim lagi di waktu selanjutnya
            return $response->json();
        } else {
            // Jika pengiriman gagal, tangani kesalahan sesuai kebutuhan
            return $response->throw();
        }
    }

    // Jika tidak ada perubahan data terakhir atau tidak ada data, tidak ada yang perlu dikirim
    return null;
}
}

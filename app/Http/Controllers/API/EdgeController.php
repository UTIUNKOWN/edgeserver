<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\ketinggian;
use Exception;
use Carbon\carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
class EdgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $data = ketinggian::latest()->first();
        // $data = Ketinggian::where('id_sensor', 1)->latest()->first();
        // $data = Ketinggian::where('id_sensor', 2)->latest()->first();

        // // Kirim respons JSON dengan data sensor
        // if($data) {
        //     return ApiFormatter::createApi(200, 'success', $data);
        //  }else {
        //      return ApiFormatter::createApi(400, 'failed');
        //  }
        // }

        $dataSensor1 = Ketinggian::where('id_sensor', 1)->latest()->first();
        $dataSensor2 = Ketinggian::where('id_sensor', 2)->latest()->first();

        $data = [
            'sensor_1' => $dataSensor1,
            'sensor_2' => $dataSensor2
        ];

        // Kirim respons JSON dengan data sensor
        if ($data['sensor_1'] && $data['sensor_2']) {
            return response()->json([
                'data' => $data,
                'waktu_pengiriman_sensor_1' => $data['sensor_1']->waktu_pengiriman_data,
                'waktu_pengiriman_sensor_2' => $data['sensor_2']->waktu_pengiriman_data,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error',
                'data' => $data
            ], 400);
        }

    }
    public function edge(Request $request)
{
    try {
        $request->validate([
            'id_sensor' => 'required',
            'kapasitas' => 'required',
        ]);

        $id_sensor = $request->id_sensor;
        $kapasitas = $request->kapasitas;

        // Simpan data di edge dengan status "pending"
        $dataEdge = ketinggian::create([
            'id_sensor' => $id_sensor,
            'kapasitas' => $kapasitas,
            'status' => 'pending'
        ]);

        $url = 'http://trash.my.id/api/monitoring';

        $data = [
            'id_sensor' => $id_sensor,
            'kapasitas' => $kapasitas,
        ];

        $client = new Client();
        $response = $client->post($url, [
            'timeout' => 4,
            'form_params' => $data
        ]);

        // Cek apakah data berhasil dikirim ke cloud
        if ($response->getStatusCode() === 200) {
            // Ubah status data di edge menjadi "success" jika berhasil dikirim ke cloud
            $check_pending = ketinggian::where('status', 'pending')->get();
            foreach ($check_pending as $key => $value) {
                $data = [
                    'id_sensor' => $value->id_sensor,
                    'kapasitas' => $value->kapasitas,
                ];
                $client->post($url, [
                    'form_params' => $data
                ]);
                ketinggian::where('id', $value->id)->update([
                    'status' => 'success'
                ]);
            }

            return ApiFormatter::createApi($data, 'Upload Successfully');
        } else {
            throw new Exception('Cloud server failed to process the request');
        }
    } catch (Exception $e) {
        // Ambil id_sensor terakhir dari edge
        $lastSensorData = ketinggian::orderBy('id', 'DESC')->first();
        $id_sensor = $lastSensorData->id_sensor;

        $data = ketinggian::create([
            'id_sensor' => $id_sensor,
            'kapasitas' => $kapasitas,
            'status' => 'pending'
        ]);

        return ApiFormatter::createApi($data, 'Upload Success but cloud server has trouble');
    }
}
    public function sampah1()
    {
        $dataSensor1 = ketinggian::where('id_sensor', 1)
        ->latest('created_at')
        ->value('kapasitas');
        return view('kapasitassampah', ['dataSensor1' => $dataSensor1]);
    }
    public function sampah2()
    {
    // Ambil data kapasitas terakhir berdasarkan id_sensor 2
    $dataSensor2 = ketinggian::where('id_sensor', 2)
    ->latest('created_at')
    ->value('kapasitas');

        return view('kapasitassampah2', ['dataSensor2' => $dataSensor2]);
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
                'kapasitas' => 'required',
            ]);
            $data = ketinggian::create([
                'id_sensor' => $request->id_sensor,
                'kapasitas' => $request->kapasitas
            ]);

            $data =ketinggian::where('id', '=', $data->id)->get();
            if($data) {
                return ApiFormatter::createApi(200, 'success', $data);
            }else {
                return ApiFormatter::createApi(400, 'failed');
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

    // FIX NIH BOS
    public function post(Request $request)
{
    try {
        $request->validate([
            'id_sensor' => 'required',
            'kapasitas' => 'required',
        ]);
        $url = 'http://trash.my.id/api/monitoring';
        $id_sensor = $request->id_sensor;
        $kapasitas = $request->kapasitas;
        $data = [
            'id_sensor' => $id_sensor,
            'kapasitas' => $kapasitas,
        ];
        $client = new Client();
        $response = $client->post($url, [
            'timeout' => 4,
            'form_params' => $data
        ]);
        if ($response->getStatusCode() == 200) {
            $data = ketinggian::create([
                'id_sensor' => $id_sensor,
                'kapasitas' => $kapasitas,
                'status' => 'success'
            ]);

            $check_pending = ketinggian::where('status', 'pending')->get();
            foreach ($check_pending as $key => $value) {
                $data = [
                    'id_sensor' => $value->id_sensor,
                    'kapasitas' => $value->kapasitas,
                ];
                $client->post($url, [
                    'form_params' => $data
                ]);
                ketinggian::where('id', $value->id)->update([
                    'status' => 'success'
                ]);
            }

            return ApiFormatter::createApi($data, 'Upload Cloud Successfully', );
        } else {
            throw new Exception('Cloud server failed to process the request');
        }
    } catch (Exception $e) {
        // Ambil id_sensor terakhir dari edge
        $lastSensorData = ketinggian::orderBy('id', 'DESC')->first();
        $id_sensor = $lastSensorData->id_sensor;

        $data = ketinggian::create([
            'id_sensor' => $id_sensor,
            'kapasitas' => $kapasitas,
            'status' => 'pending'
        ]);

        return ApiFormatter::createApi($data, 'Upload Success but cloud server has trouble');
    }
}
public function test(Request $request)
{
    {
        try {
            $request->validate([
                'id_sensor' => 'required',
                'kapasitas' => 'required',
            ]);

            $url = 'http://trash.my.id/api/monitoring';
            $id_sensor = $request->id_sensor;
            $kapasitas = $request->kapasitas;

            $data = [
                'id_sensor' => $id_sensor,
                'kapasitas' => $kapasitas,
            ];

            $client = new Client();
            $response = $client->post($url, [
                'json' => $data
            ]);

            if ($response->getStatusCode() == 200) {
                // Berhasil mengirim data ke cloud
                return response()->json([
                    'message' => 'Data sent to cloud successfully',
                ]);
            } else {
                throw new Exception('Cloud server failed to process the request');
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error occurred while sending data to cloud',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    }

    public function test2(Request $request)
    {
        try {
            $request->validate([
                'id_sensor' => 'required',
                'kapasitas' => 'required',
            ]);

            $url = 'http://trash.my.id/api/monitoring';
            $id_sensor = $request->id_sensor;
            $kapasitas = $request->kapasitas;

            $data = [
                'id_sensor' => $id_sensor,
                'kapasitas' => $kapasitas,
            ];

            $client = new Client();
            $response = $client->post($url, [
                'timeout' => 4,
                'form_params' => $data
            ]);

            // ... (kode program lainnya)
        } catch (Exception $e) {
            // Ambil id_sensor dari request
            $id_sensor = $request->id_sensor;

            $data = ketinggian::create([
                'id_sensor' => $id_sensor,
                'kapasitas' => $kapasitas,
                'status' => 'pending'
            ]);

            return response()->json([
                'message' => 'Error occurred while sending data to cloud',
                'error' => $e->getMessage(),
                'data' => $data
            ], 500);
        }
    }
    public function edge2(Request $request)
    {
        try {
            $request->validate([
                'id_sensor' => 'required',
                'kapasitas' => 'required',
            ]);

            $url = 'http://trash.my.id/api/monitoring';
            $id_sensor = $request->id_sensor;
            $kapasitas = $request->kapasitas;

            // Ambil data yang paling baru di edge
            $lastSensorData = ketinggian::orderBy('id', 'DESC')->first();
            $last_id_sensor = $lastSensorData->id_sensor;
            $last_kapasitas = $lastSensorData->kapasitas;
            $last_status = $lastSensorData->status;

            // Jika data paling baru di edge memiliki status "pending", kirim data tersebut ke cloud terlebih dahulu
            if ($last_status == 'pending') {
                $data = [
                    'id_sensor' => $last_id_sensor,
                    'kapasitas' => $last_kapasitas,
                ];

                $client = new Client();
                $response = $client->post($url, [
                    'timeout' => 4,
                    'form_params' => $data
                ]);

                // Jika data paling baru berhasil dikirim ke cloud, ubah statusnya menjadi "success"
                if ($response->getStatusCode() == 200) {
                    ketinggian::where('id', $lastSensorData->id)->update([
                        'status' => 'success'
                    ]);
                }
            }

            // Simpan data baru di edge dengan status "pending"
            $data = ketinggian::create([
                'id_sensor' => $id_sensor,
                'kapasitas' => $kapasitas,
                'status' => 'pending'
            ]);

            // Jika ada data dengan status "pending", kirim data tersebut ke cloud terlebih dahulu
            $pendingData = ketinggian::where('status', 'pending')->get();
            foreach ($pendingData as $pending) {
                $data = [
                    'id_sensor' => $pending->id_sensor,
                    'kapasitas' => $pending->kapasitas,
                ];

                $response = $client->post($url, [
                    'timeout' => 4,
                    'form_params' => $data
                ]);

                // Jika data berhasil dikirim ke cloud, ubah status data di edge menjadi "success"
                if ($response->getStatusCode() == 200) {
                    ketinggian::where('id', $pending->id)->update([
                        'status' => 'success'
                    ]);
                }
            }

            return response()->json([
                'message' => 'Data sent to cloud successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error occurred while sending data to cloud',
                'error' => $e->getMessage(),
                'data' => $data
            ], );
        }
    }
    public function delay(Request $request)
    {
        {
            try {
                $request->validate([
                    'id_sensor' => 'required',
                    'kapasitas' => 'required',
                ]);
                $url = 'http://trash.my.id/api/monitoring';
                $id_sensor = $request->id_sensor;
                $kapasitas = $request->kapasitas;
                $data = [
                    'id_sensor' => $id_sensor,
                    'kapasitas' => $kapasitas,
                ];

                // Catat waktu sebelum pengiriman
                $startTime = Carbon::now();

                $client = new Client();
                $response = $client->post($url, [
                    'timeout' => 4,
                    'form_params' => $data
                ]);

                // Catat waktu setelah pengiriman
                $endTime = Carbon::now();
                $duration = $endTime->diffInMilliseconds($startTime);

                if ($response->getStatusCode() == 200) {
                    $data = ketinggian::create([
                        'id_sensor' => $id_sensor,
                        'kapasitas' => $kapasitas,
                        'status' => 'success'
                    ]);

                    $check_pending = ketinggian::where('status', 'pending')->get();
                    foreach ($check_pending as $key => $value) {
                        $data = [
                            'id_sensor' => $value->id_sensor,
                            'kapasitas' => $value->kapasitas,
                        ];

                        // Catat waktu sebelum pengiriman
                        $startTime = Carbon::now();

                        $client->post($url, [
                            'form_params' => $data
                        ]);

                        // Catat waktu setelah pengiriman
                        $endTime = Carbon::now();
                        $duration = $endTime->diffInMilliseconds($startTime);

                        ketinggian::where('id', $value->id)->update([
                            'status' => 'success'
                        ]);
                    }

                    // Log waktu pengiriman data ke cloud server
                    Log::info('Upload Cloud Successfully. Time taken: ' . $duration . ' ms');

                    // Cetak durasi waktu ke output
                    echo 'Upload Cloud Successfully. Time taken: ' . $duration . ' ms';

                    return ApiFormatter::createApi($data, 'Upload Cloud Successfully', );
                } else {
                    throw new Exception('Cloud server failed to process the request');
                }
            } catch (Exception $e) {
                // Ambil id_sensor terakhir dari edge
                $lastSensorData = ketinggian::orderBy('id', 'DESC')->first();
                $id_sensor = $lastSensorData->id_sensor;

                $data = ketinggian::create([
                    'id_sensor' => $id_sensor,
                    'kapasitas' => $kapasitas,
                    'status' => 'pending'
                ]);

                return ApiFormatter::createApi($data, 'Upload Success but cloud server has trouble');
            }
        }
    }
}

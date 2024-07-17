<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountriesController extends Controller
{

    public function get_all_countries(){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://countriesnow.space/api/v0.1/countries/states",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false, // Disable SSL verification
            CURLOPT_SSL_VERIFYHOST => false  // Disable SSL host verification
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response()->json(['error' => $err], 400);
        } else {
            $data = json_decode($response, true);
            return response()->json(["data"=>$data['data']], 200);
        }
    }
    public function get_cities_by_country(Request $request)
    {
        $country = $request->input('country_code');

        try {
            $response = Http::withoutVerifying()->post('https://countriesnow.space/api/v0.1/countries/cities', [
                'country' => $country
            ]);

            $data = $response->json();

            if ($response->successful()) {
                return response()->json(["data"=>$data['data']], 200);
            } else {
                return response()->json(['error' => 'No City Found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


}

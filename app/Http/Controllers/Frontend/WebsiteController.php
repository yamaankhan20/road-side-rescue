<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NotificationCenter;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class WebsiteController extends Controller
{
    public function index(){

        $data_category = Category::all();

        $data = [

                "title" => "Home | Roadside Rescue"

        ];

        return view('frontend.index',$data, compact('data_category'));

    }

    public function requested_services(Request $request){



        $data_category = Category::all();
        $location = $request->query('location');
        $serv = $request->query('serv');

        if (!$location || !$serv){
            return redirect()->route('frontendhome')->with('location','Fields are required');
        }
        $userCoordinates = $this->getCoordinatesFromLocation($location);
        list($latitude, $longitude) = $userCoordinates;



        $service_all_data = Service::with(['vendor_all' => function($query) {
            $query->join('user_details as ud', 'users.id', '=', 'ud.user_id')
                ->join('user_profile_pic as upp', 'users.id', '=', 'upp.user_id')
                ->join('vendor_status as ven', 'users.id', '=', 'ven.vendor_id')
                ->where('users.role', '=', 'vendor')
                ->where('ven.status', '=', 'active')
                ->select('users.id', 'users.name', 'ud.country', 'upp.profile_pic', 'ven.status');
        }])->where('category_id', $serv)->get();

//        $all_vendor_details = $service_all_data->filter(function($service) {
//            return !$service->vendor_all->isEmpty();
//        });

        $all_vendor_details = $service_all_data->filter(function($service) use ($latitude, $longitude) {

            $current_user_ID = Auth::user();

            foreach ($service->vendor_all as $vendor) {

                $vendorCoordinates = $this->getCoordinatesFromLocation($vendor->country);

                if ($vendorCoordinates && $this->calculateDistance($latitude, $longitude, $vendorCoordinates[0], $vendorCoordinates[1]) <= 1) {

                    $notification_check_count = NotificationCenter::where('All_count', 1)
                        ->where('sender_id', $current_user_ID->id)
                        ->where('category_id', $service->category_id)
                        ->count();

                    if($notification_check_count === 0){
                        $create_notification = NotificationCenter::create(
                            [
                                'category_id' => $service->category_id,
                                "service_id" => $service->id,
                                "sender_id" => $current_user_ID->id,
                                'receiver_id' => $vendor->id,
                                "message" => $current_user_ID->name.' has requested!!!',
                                'status' => "in_progress",
                            ]
                        );

                    }
                    return true;
                }
            }
            return false;
        });



        return view('frontend.requested-services', compact("all_vendor_details", "data_category"));
    }


    private function getCoordinatesFromLocation($location)
    {
        $apiKey = 'AIzaSyAF9q3rW1aL52AJ_Yy2KIYVKQyjNn7PLIs';
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($location)."&key=".$apiKey;

        $response = file_get_contents($url);
        $json = json_decode($response, true);

        if ($json['status'] == 'OK') {
            $coordinates = $json['results'][0]['geometry']['location'];
            return [$coordinates['lat'], $coordinates['lng']];
        }

        return null;
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Earth's radius in kilometers

        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lon1);
        $latTo = deg2rad($lat2);
        $lonTo = deg2rad($lon2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        $distance = $angle * $earthRadius;

        return $distance; // Distance in kilometers
    }


    public function Get_all_services_by_ID(Request $request){
        $vendor_id = $request->input('vendor_id');
        $Category_id = $request->input('Category_id');

        $all_servicse = Service::where("vendor_id", $vendor_id)
            ->where("category_id",$Category_id)
            ->get();

        $all_data = "";

        if ($all_servicse->isNotEmpty()) {
            foreach ($all_servicse as $service) {
                $all_data .= '
                <div class="serv-tabs">
                    <div class="serv-tab-img">
                        <img src="' . asset('frontend_assets/images/Rectangle 616.png') . '" alt="service profile">
                    </div>
                    <div class="serv-tab-disc">
                        <p>' . htmlspecialchars($service->name) . '</p>
                        <div class="serv-rating">
                            <img src="' . asset('frontend_assets/images/Group 7698.png') . '" alt="star">
                            <span>4.5 Rating</span>
                        </div>
                        <div class="hire-serv">
                            <span><img src="' . asset('frontend_assets/images/Group 8485.png') . '" alt="Toing">Toing</span>
                            <span><img src="' . asset('frontend_assets/images/Group 9013.png') . '" alt="Mechanic">Mechanic</span>
                        </div>
                    </div>
                    <div class="serv-tab-info">
                        <div class="trace">
                            <span class="track-time">10 mins</span>
                            <div class="track-distance">
                                <span class="track-st">1609 Oak, St.</span>
                                <span class="track-km">(2km)</span>
                            </div>
                        </div>
                        <div class="activate-btns">
                            <a href="javascript:;" class="hire-btn">hire me</a>
                            <a href="javascript:;" class="share-btn"><img src="' . asset('frontend_assets/images/send.png') . '" alt="send"></a>
                            <a href="javascript:;" class="call-btn"><img src="' . asset('frontend_assets/images/call.png') . '" alt="call"></a>
                        </div>
                    </div>
                </div>';
            }
        } else {
            $all_data = '<div class="serv-tabs justify-content-center"><p class="m-2">No Service Found</p></div>';
        }

        // Return the HTML as a JSON response
        return response()->json([
            'success' => true,
            'data' => $all_data,
        ]);

    }

}

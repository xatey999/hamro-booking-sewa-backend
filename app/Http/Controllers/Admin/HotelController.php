<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelOwner;
use App\Models\HotelRooms;
use Illuminate\Support\Str;
use File;

class HotelController extends Controller
{


    //for data to display in mobile format:
    public function listMobile()
    {
        $hotelownerData = HotelOwner::with('rooms')->get();
        // dd($hotelownerData);
        return response()->json($hotelownerData);
    }

    //first page to popup
    public function index()
    {
        return view('admin.modules.hotelowner.add');
    }

    //for saving in database
    public function store(Request $request)
    {
        $hotelownerData = new HotelOwner();
        $hotelownerData->fill($request->all());
        $newThumbnailImageName = $request->file('photos')->getClientOriginalName();
        // dd($newThumbnailImageName);
        $request->photos->move('images/hotel/', $newThumbnailImageName);

        $hotelownerData->photos = $newThumbnailImageName;

        // $hotelownerData->hotel_status = "Pending";

        $hotelownerData->slug = Str::slug($request->title);

        $hotelownerData->save();

        return redirect()->route('storeowner')->with('success', 'New Hotel Owner Added Successfully');
    }

    //for listing
    public function list()
    {
        $hotelownerData = HotelOwner::all();
        return view('admin.modules.hotelowner.list', compact('hotelownerData'));
    }

    //for deleting
    public function delete($id)
    {
        $hotelownerData = HotelOwner::find($id);
        $hotelownerData->delete();
        return redirect()->route('listowner')->with('message', 'Data deleted successfully!!');
    }

    //for status
    public function verify($id)
    {
        $record = HotelOwner::findorFail($id);
        if ($record->hotel_status == "Approved") {
            $record->hotel_status = 'Pending';
        } else $record->hotel_status = 'Approved';
        $record->save();
        return redirect()->route('listowner');
    }

    //for editing
    public function edit($id)
    {
        $hotelownerData = HotelOwner::find($id);
        return view('admin.modules.hotelowner.update', compact('hotelownerData'));
    }

    //for updating
    public function update(Request $request, $id)
    {
        $hotelownerData = HotelOwner::find($id);
        $hotelownerData->title = $request->owner_title;
        $hotelownerData->description = $request->owner_description;
        $hotelownerData->phone_number = $request->owner_phone_number;
        $hotelownerData->email = $request->owner_email;
        $hotelownerData->location = $request->owner_location;
        $hotelownerData->rating = $request->owner_rating;
        $hotelownerData->owner_status = $hotelownerData->owner_status;


        if ($request->has('photos')) {

            File::delete(public_path('images/hotel/' . $hotelownerData->photos));

            $newThumbnailImageName = $request->file('photos')->getClientOriginalName();
            // dd($newThumbnailImageName);
            $request->photos->move('images/hotel/', $newThumbnailImageName);

            $hotelownerData->photos = $newThumbnailImageName;
        }
        $hotelownerData->save();
        return redirect()->route('listowner')->with('success', 'Data updated successfully!!');
    }
}

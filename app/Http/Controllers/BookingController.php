<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Guest;
use App\Workshop;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    /**
     * Load main page with all available workshops
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bookings()
    {
        return view('workshop-booking', [
            'workshops' => Workshop::getWorkshops()
        ]);
    }

    /**
     * Check available spots and make records in the Booking and Guest tables
     * @param Request $request
     */
    public function bookWorkshop(Request $request)
    {
        $data = $request->all();

        $slot = Workshop::getSpot($data['bookWorkshop']['workshop_id']);
        if ($slot['slot'] - Booking::getGuestsNumber($data['bookWorkshop']['workshop_id']) - count($data['guests']) < 0) {
            return response('You have not booked workshop spots', 400);
        } else {
            $book_id = Booking::create($data['bookWorkshop'])->id;

            foreach ($data['guests'] as $item) {
                $item['booking_id'] = $book_id;
                Guest::create($item);
            }
            return response('You have booked workshop spots successfully', 200);
        }
    }

    /**
     * Check available spots before booking
     * @param Request $request
     */
    public function getSpotNumber(Request $request)
    {
        $workshop_id = $request->all()['workshop_id'];
        $slot = Workshop::getSpot($workshop_id);

        echo $slot['slot'] - Booking::getGuestsNumber($workshop_id);
    }
}

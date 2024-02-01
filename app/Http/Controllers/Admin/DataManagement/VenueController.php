<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Exception;

class VenueController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        try {
            $Venue = view(
                'admin.DataManagment.Venue.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $Venue,
            ]);
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
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
            // validated request


            // validated request
            $data = [
                'venue_name'=>$request['venue_name']];

            $venue = Venue::create($data);
            // $Judge->refresh();

            $venueInformation = Venue::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $VenueTable = view(
                'admin.DataManagment.Venue.index',
                compact('venueInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Venue added successfully !',
                'output' => $VenueTable,
            ]);
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
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
        try {
            $info = Venue::find($id);
            $VenueModel = view(
                'admin.DataManagment.Venue.edit',
                compact('info')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $VenueModel,
            ]);
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
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
        try {
            $checkInfo =  Venue::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'venue_name'=>$request['venue_name']
                ];

                $Venue = $checkInfo->update($data);
                // $Judge->refresh();

             
            $venueInformation = Venue::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $VenueTable = view(
                'admin.DataManagment.Venue.index',
                compact('venueInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Venue updated successfully !',
                'output' => $VenueTable,
            ]);
            }
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
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
        try {
            $Venue = Venue::find($id);
            $Venue->delete();
            $venueInformation = Venue::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $VenueTable = view(
                'admin.DataManagment.Venue.index',
                compact('venueInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Venue deleted successfully !',
                'output' => $VenueTable,
            ]);
            
        } catch (Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }
}

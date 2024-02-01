<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\DefenseFirm;
use Illuminate\Http\Request;

class DefenseFirmController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        try {
            $DefenseFirm = view(
                'admin.DataManagment.DefenseFirm.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $DefenseFirm,
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
                'firm_name' => $request['firm_name'],
                'name' => $request['name'],
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'zip_code' => $request['zip_code'],
                'phone_number' => $request['phone_number'],
                'fax_number' => $request['fax_number'],
                'best_contact_person' => $request['best_contact_person'],
                'known_email' => $request['known_email'],
            ];

            $DefenseFirm = DefenseFirm::create($data);
            // $DefenseFirm->refresh();

            $DefenseInformation = DefenseFirm::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $DefenseFirmTable = view(
                'admin.DataManagment.DefenseFirm.index',
                compact('DefenseInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Defence firm added successfully !',
                'output' => $DefenseFirmTable,
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
            $info = DefenseFirm::find($id);
            $provoiderModel = view(
                'admin.DataManagment.DefenseFirm.edit',
                compact('info')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $provoiderModel,
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
            $checkInfo =  DefenseFirm::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'firm_name' => $request['firm_name'],
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'city' => $request['city'],
                    'state' => $request['state'],
                    'zip_code' => $request['zip_code'],
                    'phone_number' => $request['phone_number'],
                    'fax_number' => $request['fax_number'],
                    'best_contact_person' => $request['best_contact_person'],
                    'known_email' => $request['known_email'],
                ];

                $DefenseFirm = $checkInfo->update($data);

                // $DefenseFirm->refresh();

                $DefenseInformation = DefenseFirm::orderBy('id', 'DESC')->paginate(
                    config('app.paginate')
                );
                $DefenseFirmTable = view(
                    'admin.DataManagment.DefenseFirm.index',
                    compact('DefenseInformation')
                )->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Defence firm updated successfully !',
                    'output' => $DefenseFirmTable,
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
            $DefenseFirm = DefenseFirm::find($id);
            $DefenseFirm->delete();
            $DefenseInformation = DefenseFirm::orderBy('id', 'DESC')
                ->paginate(config('app.paginate'));
            $DefenseFirmTable = view(
                'admin.DataManagment.DefenseFirm.index',
                compact('DefenseInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Information deleted successfully !',
                'output' => $DefenseFirmTable,
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

<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\Arbitrator;
use App\Models\DefenseFirm;
use App\Models\InsuranceCompany;
use App\Models\Judge;
use App\Models\Venue;
use App\Models\ProvoiderInformation;
use Illuminate\Http\Request;

class ProvoiderInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $DefenseInformation = DefenseFirm::orderBy('id', 'DESC')->paginate(config('app.paginate'));
            $JudgeInformation =  Judge::orderBy('id', 'DESC')->paginate(config('app.paginate'));
            $venueInformation =  Venue::orderBy('id', 'DESC')->paginate(config('app.paginate'));
            $insuranceInformation = InsuranceCompany::orderBy('id', 'DESC')->paginate(config('app.paginate'));
            $arbitratorInformation =  Arbitrator::orderBy('id', 'DESC')->paginate(config('app.paginate'));
            $provoiderInformation = ProvoiderInformation::orderBy('id', 'DESC')->paginate(config('app.paginate'));
            return view('admin.data-management', compact('arbitratorInformation','venueInformation','provoiderInformation','insuranceInformation','DefenseInformation','JudgeInformation'));
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $provoiderInformation = view(
                'admin.DataManagment.ProvoiderInformation.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $provoiderInformation,
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
            $data = [
                'provider_type' => $request['provider_type'],
                'name' => $request['name'],
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'zip_code' => $request['zip_code'],
                'phone_number' => $request['phone_number'],
                'tax_id' => $request['tax_id'],
                'owner_name' => $request['owner_name'],
                'owner_address' => $request['owner_address'],
                'owner_phone_number' => $request['owner_phone_number'],
                'owner_user_name' => $request['owner_user_name'],
                'owner_password' => $request['owner_password'],
                'owner_license_number' => $request['owner_license_number'],
                'affidavit_signor' => $request['affidavit_signor'],
                'litigation_principle' => $request['litigation_principle'],
                'litigation_interest' => $request['litigation_interest'],
                'arbitration_principle' => $request['arbitration_principle'],
                'arbitration_interest' => $request['arbitration_interest'],
                'billing_company' => $request['billing_company'],
                'billing_company_person_name' => $request['billing_company_person_name'],
                'billing_company_contact_person' => $request['billing_company_contact_person'],
                'billing_company_phone' => $request['billing_company_phone'],
                'billing_company_email' => $request['billing_company_email'],
            ];

            $ProvoiderInformation = ProvoiderInformation::create($data);
            // $ProvoiderInformation->refresh();

            $provoiderInformation = ProvoiderInformation::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $provoiderInformationTable = view(
                'admin.DataManagment.ProvoiderInformation.index',
                compact('provoiderInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Provoider Information added successfully !',
                'output' => $provoiderInformationTable,
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
            $info = ProvoiderInformation::find($id);
            $provoiderModel = view(
                'admin.DataManagment.ProvoiderInformation.edit',
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
            $checkInfo =  ProvoiderInformation::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'provider_type' => $request['provider_type'],
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'city' => $request['city'],
                    'state' => $request['state'],
                    'zip_code' => $request['zip_code'],
                    'phone_number' => $request['phone_number'],
                    'tax_id' => $request['tax_id'],
                    'owner_name' => $request['owner_name'],
                    'owner_address' => $request['owner_address'],
                    'owner_phone_number' => $request['owner_phone_number'],
                    'owner_user_name' => $request['owner_user_name'],
                    'owner_password' => $request['owner_password'],
                    'owner_license_number' => $request['owner_license_number'],
                    'affidavit_signor' => $request['affidavit_signor'],
                    'litigation_principle' => $request['litigation_principle'],
                    'litigation_interest' => $request['litigation_interest'],
                    'arbitration_principle' => $request['arbitration_principle'],
                    'arbitration_interest' => $request['arbitration_interest'],
                    'billing_company' => $request['billing_company'],
                    'billing_company_person_name' => $request['billing_company_person_name'],
                    'billing_company_contact_person' => $request['billing_company_contact_person'],
                    'billing_company_phone' => $request['billing_company_phone'],
                    'billing_company_email' => $request['billing_company_email'],
                ];

                $ProvoiderInformation = $checkInfo->update($data);
                // $ProvoiderInformation->refresh();

                $provoiderInformation = ProvoiderInformation::orderBy('id', 'DESC')->paginate(
                    config('app.paginate')
                );
                $provoiderInformationTable = view(
                    'admin.DataManagment.ProvoiderInformation.index',
                    compact('provoiderInformation')
                )->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Provoider Information added successfully !',
                    'output' => $provoiderInformationTable,
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
            $provoiderInformation = ProvoiderInformation::find($id);
            $provoiderInformation->delete();
            $provoiderInformation = ProvoiderInformation::orderBy('id', 'DESC')
                ->paginate(config('app.paginate'));
                $provoiderInformationTable = view(
                    'admin.DataManagment.ProvoiderInformation.index',
                    compact('provoiderInformation')
                )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Provoider Information deleted successfully !',
                'output' => $provoiderInformationTable,
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

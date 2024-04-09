<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCompany;
use Illuminate\Http\Request;

class InsuranceCompanyController  extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $InsuranceCompany = view(
                'admin.DataManagment.InsuranceCompany.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $InsuranceCompany,
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
                'insurance_company' => $request['insurance_company'],
                'name' => $request['name'],
                'address' => $request['address'],
                'city' => $request['city'],
                'state' => $request['state'],
                'zip_code' => $request['zip_code'],
                'NAIC' => $request['NAIC'],
                'DMV' => $request['DMV'],
                'phone_number' => $request['phone_number'],
                'fax_number' => $request['fax_number'],
                'best_contact_person' => $request['best_contact_person'],
                'known_email' => $request['known_email'],
                'filing_fees_date_specific' => $request['filing_fees_date_specific'],
            ];

            $InsuranceCompany = InsuranceCompany::create($data);
            // $InsuranceCompany->refresh();

            $insuranceInformation = InsuranceCompany::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $InsuranceCompanyTable = view(
                'admin.DataManagment.InsuranceCompany.index',
                compact('insuranceInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Insurance Company added successfully !',
                'output' => $InsuranceCompanyTable,
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
            $info = InsuranceCompany::find($id);
            $provoiderModel = view(
                'admin.DataManagment.InsuranceCompany.edit',
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
            $checkInfo =  InsuranceCompany::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'insurance_company' => $request['insurance_company'],
                    'name' => $request['name'],
                    'address' => $request['address'],
                    'city' => $request['city'],
                    'state' => $request['state'],
                    'zip_code' => $request['zip_code'],
                    'NAIC' => $request['NAIC'],
                    'DMV' => $request['DMV'],
                    'phone_number' => $request['phone_number'],
                    'fax_number' => $request['fax_number'],
                    'best_contact_person' => $request['best_contact_person'],
                    'known_email' => $request['known_email'],
                    'filing_fees_date_specific' => $request['filing_fees_date_specific'],
                ];

                $InsuranceCompany = $checkInfo->update($data);;
                // $InsuranceCompany->refresh();

                $insuranceInformation = InsuranceCompany::orderBy('id', 'DESC')->paginate(
                    config('app.paginate')
                );
                $InsuranceCompanyTable = view(
                    'admin.DataManagment.InsuranceCompany.index',
                    compact('insuranceInformation')
                )->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Insurance Company updated successfully !',
                    'output' => $InsuranceCompanyTable,
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
            $InsuranceCompany = InsuranceCompany::find($id);
            $InsuranceCompany->delete();
            $insuranceInformation = InsuranceCompany::orderBy('id', 'DESC')
                ->paginate(config('app.paginate'));
            $InsuranceCompanyTable = view(
                'admin.DataManagment.InsuranceCompany.index',
                compact('insuranceInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Information deleted successfully !',
                'output' => $InsuranceCompanyTable,
            ]);
        } catch (Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    public function search($q=null)
    {
        try {
          
            $query = InsuranceCompany::orderBy('id', 'DESC');
            if(!empty($query))
            {
                $query->where('insurance_company','like','%'.$q.'%');
            }
            $insuranceInformation=$query->get();
            $InsuranceCompanyTable = view(
                'admin.DataManagment.InsuranceCompany.index',
                compact('insuranceInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Information deleted successfully !',
                'output' => $InsuranceCompanyTable,
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

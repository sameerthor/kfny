<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\CaseStatus;
use Illuminate\Http\Request;
use Exception;

class CaseStatusController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        try {
            $CaseStatus = view(
                'admin.DataManagment.CaseStatus.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $CaseStatus,
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
                'status'=>$request['status']];

            $caseStatus = CaseStatus::create($data);
            // $Judge->refresh();

            $caseStatusInformation = CaseStatus::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $caseStatusTable = view(
                'admin.DataManagment.CaseStatus.index',
                compact('caseStatusInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Case Status added successfully !',
                'output' => $caseStatusTable,
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
            $info = CaseStatus::find($id);
            $caseStatusModel = view(
                'admin.DataManagment.CaseStatus.edit',
                compact('info')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $caseStatusModel,
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
            $checkInfo =  CaseStatus::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'status'=>$request['status']
                ];

                 $checkInfo->update($data);
                // $Judge->refresh();

             
            $caseStatusInformation = CaseStatus::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $caseStatusTable = view(
                'admin.DataManagment.CaseStatus.index',
                compact('caseStatusInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Case Status updated successfully !',
                'output' => $caseStatusTable,
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
            $caseStatus = CaseStatus::find($id);
            $caseStatus->delete();
            $caseStatusInformation = CaseStatus::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $caseStatusTable = view(
                'admin.DataManagment.CaseStatus.index',
                compact('caseStatusInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Case Status deleted successfully !',
                'output' => $caseStatusTable,
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
          
            $query = CaseStatus::orderBy('id', 'DESC');
            if(!empty($query))
            {
                $query->where('status','like','%'.$q.'%');
            }
            $caseStatusInformation=$query->get();
            $caseStatusTable = view(
                'admin.DataManagment.CaseStatus.index',
                compact('caseStatusInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $caseStatusTable,
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

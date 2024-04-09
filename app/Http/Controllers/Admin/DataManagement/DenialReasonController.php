<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\DenialReason;
use Illuminate\Http\Request;
use Exception;

class DenialReasonController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        try {
            $DenialReason = view(
                'admin.DataManagment.DenialReason.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $DenialReason,
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
                'title'=>$request['title'],
                'description'=>$request['description']
            ];

            $denial_reason = DenialReason::create($data);
            // $Judge->refresh();

            $denialReasonInformation = DenialReason::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $DenialReasonTable = view(
                'admin.DataManagment.DenialReason.index',
                compact('denialReasonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'DenialReason added successfully !',
                'output' => $DenialReasonTable,
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
            $info = DenialReason::find($id);
            $DenialReasonModel = view(
                'admin.DataManagment.DenialReason.edit',
                compact('info')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $DenialReasonModel,
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
            $checkInfo =  DenialReason::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'title'=>$request['title'],
                    'description'=>$request['description']
                ];

                $DenialReason = $checkInfo->update($data);
                // $Judge->refresh();

             
            $denialReasonInformation = DenialReason::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $DenialReasonTable = view(
                'admin.DataManagment.DenialReason.index',
                compact('denialReasonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'DenialReason updated successfully !',
                'output' => $DenialReasonTable,
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
            $DenialReason = DenialReason::find($id);
            $DenialReason->delete();
            $denialReasonInformation = DenialReason::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $DenialReasonTable = view(
                'admin.DataManagment.DenialReason.index',
                compact('denialReasonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'DenialReason deleted successfully !',
                'output' => $DenialReasonTable,
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
          
            $query = DenialReason::orderBy('id', 'DESC');
            if(!empty($query))
            {
                $query->where('denial_reason_name','like','%'.$q.'%');
            }
            $denialReasonInformation=$query->get();
            $DenialReasonTable = view(
                'admin.DataManagment.DenialReason.index',
                compact('denialReasonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $DenialReasonTable,
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

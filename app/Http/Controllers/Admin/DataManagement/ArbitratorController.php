<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\Arbitrator;
use Illuminate\Http\Request;
use Exception;

class ArbitratorController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        try {
            $Arbitrator = view(
                'admin.DataManagment.Arbitrator.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $Arbitrator,
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
                'name'=>$request['name'],
                'email'=>$request['email'],
                'phone_number'=>$request['phone_number']
            ];

            $arbitrator = Arbitrator::create($data);
            // $Judge->refresh();

            $arbitratorInformation = Arbitrator::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $ArbitratorTable = view(
                'admin.DataManagment.Arbitrator.index',
                compact('arbitratorInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Arbitrator added successfully !',
                'output' => $ArbitratorTable,
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
            $info = Arbitrator::find($id);
            $ArbitratorModel = view(
                'admin.DataManagment.Arbitrator.edit',
                compact('info')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $ArbitratorModel,
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
            $checkInfo =  Arbitrator::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'name'=>$request['name'],
                    'email'=>$request['email'],
                    'phone_number'=>$request['phone_number']
                                ];

                $Arbitrator = $checkInfo->update($data);
                // $Judge->refresh();

             
            $arbitratorInformation = Arbitrator::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $ArbitratorTable = view(
                'admin.DataManagment.Arbitrator.index',
                compact('arbitratorInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Arbitrator updated successfully !',
                'output' => $ArbitratorTable,
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
            $Arbitrator = Arbitrator::find($id);
            $Arbitrator->delete();
            $arbitratorInformation = Arbitrator::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $ArbitratorTable = view(
                'admin.DataManagment.Arbitrator.index',
                compact('arbitratorInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Arbitrator deleted successfully !',
                'output' => $ArbitratorTable,
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

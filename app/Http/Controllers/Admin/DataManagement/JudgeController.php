<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\Judge;
use Illuminate\Http\Request;

class JudgeController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        try {
            $Judge = view(
                'admin.DataManagment.Judge.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $Judge,
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
'vanue'=>$request['vanue'],
'court'=>$request['court'],
'email'=>$request['email'],
'phone_number'=>$request['phone_number'],
'address'=>$request['address'],
'court_attorney_name'=>$request['court_attorney_name'],
'court_attorney_email'=>$request['court_attorney_email'],
'court_attorney_phone_number'=>$request['court_attorney_phone_number'],
            ];

            $Judge = Judge::create($data);
            // $Judge->refresh();

            $JudgeInformation = Judge::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $JudgeTable = view(
                'admin.DataManagment.Judge.index',
                compact('JudgeInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Provoider Information added successfully !',
                'output' => $JudgeTable,
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
            $info = Judge::find($id);
            $provoiderModel = view(
                'admin.DataManagment.Judge.edit',
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
            $checkInfo =  Judge::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'name'=>$request['name'],
                    'vanue'=>$request['vanue'],
                    'court'=>$request['court'],
                    'email'=>$request['email'],
                    'phone_number'=>$request['phone_number'],
                    'address'=>$request['address'],
                    'court_attorney_name'=>$request['court_attorney_name'],
                    'court_attorney_email'=>$request['court_attorney_email'],
                    'court_attorney_phone_number'=>$request['court_attorney_phone_number'],
                ];

                $Judge = $checkInfo->update($data);
                // $Judge->refresh();

                $JudgeInformation = Judge::orderBy('id', 'DESC')->paginate(
                    config('app.paginate')
                );
                $JudgeTable = view(
                    'admin.DataManagment.Judge.index',
                    compact('JudgeInformation')
                )->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Provoider Information added successfully !',
                    'output' => $JudgeTable,
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
            $Judge = Judge::find($id);
            $Judge->delete();
            $JudgeInformation = Judge::orderBy('id', 'DESC')
                ->paginate(config('app.paginate'));
            $JudgeTable = view(
                'admin.DataManagment.Judge.index',
                compact('JudgeInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Information deleted successfully !',
                'output' => $JudgeTable,
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
          
            $query = Judge::orderBy('id', 'DESC');
            if(!empty($query))
            {
                $query->where('name','like','%'.$q.'%');
            }
            $JudgeInformation=$query->get();
            $JudgeTable = view(
                'admin.DataManagment.Judge.index',
                compact('JudgeInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Information deleted successfully !',
                'output' => $JudgeTable,
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

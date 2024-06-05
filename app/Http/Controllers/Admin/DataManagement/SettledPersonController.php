<?php

namespace App\Http\Controllers\Admin\DataManagement;

use App\Http\Controllers\Controller;
use App\Models\SettledPerson;
use Illuminate\Http\Request;
use Exception;

class SettledPersonController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        try {
            $SettledPerson = view(
                'admin.DataManagment.SettledPerson.store'
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $SettledPerson,
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
                'email_fax'=>$request['email_fax'],
                'phone_number'=>$request['phone_number']
            ];

             SettledPerson::create($data);
            // $Judge->refresh();

            $settledPersonInformation = SettledPerson::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $SettledPersonTable = view(
                'admin.DataManagment.SettledPerson.index',
                compact('settledPersonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'SettledPerson added successfully !',
                'output' => $SettledPersonTable,
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
            $info = SettledPerson::find($id);
            $SettledPersonModel = view(
                'admin.DataManagment.SettledPerson.edit',
                compact('info')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $SettledPersonModel,
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
            $checkInfo =  SettledPerson::find($id);
            if ($checkInfo) {


                // validated request
                $data = [
                    'name'=>$request['name'],
                    'email_fax'=>$request['email_fax'],
                    'phone_number'=>$request['phone_number']
                ];

                $SettledPerson = $checkInfo->update($data);
                // $Judge->refresh();

             
            $settledPersonInformation = SettledPerson::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $SettledPersonTable = view(
                'admin.DataManagment.SettledPerson.index',
                compact('settledPersonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'SettledPerson updated successfully !',
                'output' => $SettledPersonTable,
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
            $SettledPerson = SettledPerson::find($id);
            $SettledPerson->delete();
            $settledPersonInformation = SettledPerson::orderBy('id', 'DESC')->paginate(
                config('app.paginate')
            );
            $SettledPersonTable = view(
                'admin.DataManagment.SettledPerson.index',
                compact('settledPersonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'message' => 'SettledPerson deleted successfully !',
                'output' => $SettledPersonTable,
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
          
            $query = SettledPerson::orderBy('id', 'DESC');
            if(!empty($query))
            {
                $query->where('name','like','%'.$q.'%');
            }
            $settledPersonInformation=$query->get();
            $SettledPersonTable = view(
                'admin.DataManagment.SettledPerson.index',
                compact('settledPersonInformation')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $SettledPersonTable,
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

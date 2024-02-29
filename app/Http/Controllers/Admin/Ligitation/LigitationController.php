<?php

namespace App\Http\Controllers\Admin\Ligitation;

use App\Http\Controllers\Controller;
use App\Models\BasicIntake;
use App\Models\BasicIntakeDetails;
use App\Models\DefenseFirm;
use App\Models\FillingInformation;
use App\Models\InsuranceCompany;
use App\Models\ProvoiderInformation;
use App\Models\SettelmentJudge;
use App\Models\SettelmentJudgeDetail;
use App\Models\Venue;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class LigitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insuranceId = InsuranceCompany::orderBy('id', 'desc')->get();;
        $provoiderId = ProvoiderInformation::orderBy('id', 'desc')->get();
        $defenceFirmId = DefenseFirm::orderBy('id', 'desc')->get();
        $venueCounty = Venue::all();
        return view('admin.Ligitation.index', compact('venueCounty','defenceFirmId', 'insuranceId', 'provoiderId'));
    }
    
    public function livewireView()
    {
        return view('admin.Ligitation.livewire-index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $insuranceId = InsuranceCompany::orderBy('id', 'desc')->get();
            $provoiderId = ProvoiderInformation::orderBy('id', 'desc')->get();
            $defenceFirmId = DefenseFirm::orderBy('id', 'desc')->get();
            $venueCounty = Venue::all();
            $basicIntake = view(
                'admin.Ligitation.add-basic-intake',
                compact('defenceFirmId','venueCounty','insuranceId', 'provoiderId')
            )->render();
            return response()->json([
                'status' => 'success',
                'output' => $basicIntake,
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
        $id = $request->get('basic_intake_id');
        $data = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'doa' => $request['doa'],
            'dpo' => $request['dpo'],
            'claim_number' => $request['claim_number'],
            'policy_number' => $request['policy_number'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip_code' => $request['zip_code'],
            'self_insh' => $request['self_insh'],
            'venue_county' => $request['venue_county'],
            'is_ligitation' => $request['is_ligitation'],
            'insured' => $request['insured'],
            'index_no' => $request['index_no'],
            'insurance_company_id' => $request['insurance_company_id'],
            'provider_id' => $request['provider_id'],
            'defense_firm_id' => $request['defense_firm_id'],
            'phone_number' => $request['phone_number'],
            'aaa_number' => $request['aaa_number'],
            'appeal_docket' => $request['appeal_docket'],
            'carrier_attorney' => $request['carrier_attorney'],
            'fax_number' => $request['fax_number'],
            'best_contact_person' => $request['best_contact_person'],
            'known_email' => $request['known_email'],
            'status' => $request['status'],
            'attorney_notes' => $request['attorney_notes'],
            'notes' => $request['notes'],
        ];

        if (empty($id)) {
            $basicIntake  = BasicIntake::create($data);
            $inc_comp=InsuranceCompany::find($request['insurance_company_id']);
            FillingInformation::create(['basic_intake_id' => $basicIntake['id']]);
            SettelmentJudge::create(['basic_intake_id' => $basicIntake['id'],'settled_with'=>$inc_comp->name,'phone_number'=>$inc_comp->phone_number,'email_fax'=>$inc_comp->known_email,'fee_charged'=>$inc_comp->filing_fees_date_specific]);
            $basicIntake = BasicIntake::find($basicIntake['id']);
        } else {
            $basicIntake = BasicIntake::find($id);
            if($basicIntake->provider_id !=$request['provider_id'])
            {
                $basicIntake  = BasicIntake::create($data);
                $inc_comp=InsuranceCompany::find($request['insurance_company_id']);
                FillingInformation::create(['basic_intake_id' => $basicIntake['id']]);
                SettelmentJudge::create(['basic_intake_id' => $basicIntake['id'],'settled_with'=>$inc_comp->name,'phone_number'=>$inc_comp->phone_number,'email_fax'=>$inc_comp->known_email,'fee_charged'=>$inc_comp->filing_fees_date_specific]);
                $basicIntake = BasicIntake::find($basicIntake['id']);
            }else{
            $basicIntake->update($data);
            $basicIntake->refresh();
            }
        }

        if (is_array($request['basic_intake_details'])) {
            $array = $request['basic_intake_details'];
            $newArray = array();
            foreach (array_keys($array) as $fieldKey) {
                foreach ($array[$fieldKey] as $key => $value) {
                    $newArray[$key][$fieldKey] = $value;
                }
            }
            BasicIntakeDetails::where('basic_intake_id', $basicIntake['id'])->delete();
            foreach ($newArray as $res) {
                $res['basic_intake_id'] = $basicIntake['id'];
                BasicIntakeDetails::create($res);
            }
        }

        $basicIntakeHeader = view(
            'admin.Ligitation.header-tab',
            compact('basicIntake')
        )->render();

        $basicIntakeForm = $this->edit($basicIntake->id);

        return response()->json([
            'status' => 'success',
            'message' => 'Basic intake saved successfully !',
            'header' => $basicIntakeHeader,
            'form' => $basicIntakeForm,
            'id' => $basicIntake->id
        ]);
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
        $insuranceId = InsuranceCompany::orderBy('id', 'desc')->get();
        $provoiderId = ProvoiderInformation::orderBy('id', 'desc')->get();
        $defenceFirmId = DefenseFirm::orderBy('id', 'desc')->get();
        $venueCounty = Venue::all();

        $info = BasicIntake::find($id);
        $basicIntake = view(
            'admin.Ligitation.edit-basic-intake',
            compact('info','venueCounty','defenceFirmId', 'insuranceId', 'provoiderId')
        )->render();

        return $basicIntake;
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
        $BasicIntake = BasicIntake::find($id);
        $data = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'doa' => $request['doa'],
            'dpo' => $request['dpo'],
            'claim_number' => $request['claim_number'],
            'policy_number' => $request['policy_number'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
            'zip_code' => $request['zip_code'],
            'self_insh' => $request['self_insh'],
            'venue_county' => $request['venue_county'],
            'is_ligitation' => $request['is_ligitation'],
            'insurance_company_id' => $request['insurance_company_id'],
            'provider_id' => $request['provider_id'],
            'defense_firm_id' => $request['defense_firm_id'],
            'phone_number' => $request['phone_number'],
            'fax_number' => $request['fax_number'],
            'best_contact_person' => $request['best_contact_person'],
            'known_email' => $request['known_email'],
            'status' => $request['status'],
            'attorney_notes' => $request['attorney_notes'],
            'notes' => $request['notes'],
        ];
        $BasicIntake->update($data);
        $basicIntakes = BasicIntake::orderBy('id', 'DESC')->paginate(config('app.paginate'));
        $basicIntakeTable = view(
            'admin.Ligitation.Include.basic-intake-table',
            compact('basicIntakes')
        )->render();
        return response()->json([
            'status' => 'success',
            'message' => 'Basic intake saved successfully !',
            'output' => $basicIntakeTable,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {

        try {

            $basicIntake = BasicIntake::find($request->get('query'));
            if ($basicIntake) {
                $basicIntakeHeader = view(
                    'admin.Ligitation.header-tab',
                    compact('basicIntake')
                )->render();

                $basicIntakeForm = $this->edit($basicIntake->id);

                return response()->json([
                    'status' => 'success',
                    'header' => $basicIntakeHeader,
                    'form' => $basicIntakeForm,
                ]);
            }

            $insuranceId = InsuranceCompany::orderBy('id', 'desc')->get();
            $provoiderId = ProvoiderInformation::orderBy('id', 'desc')->get();
            $defenceFirmId = DefenseFirm::orderBy('id', 'desc')->get();
            $venueCounty = Venue::all();
 
            $basicIntakeForm = view(
                'admin.Ligitation.add-basic-intake',
                compact('defenceFirmId','venueCounty','insuranceId', 'provoiderId')
            )->render();

            $basicIntakeHeader = view(
                'admin.Ligitation.header-tab'
            )->render();

            return response()->json([
                'status' => 'notfound',
                'header' => $basicIntakeHeader,
                'form' => $basicIntakeForm,
            ]);
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }


    public function editFillingInfo(Request $request)
    {

        try {

            $basicIntake = BasicIntake::find($request['query']);
            if ($basicIntake) {
                $fillingInfo = FillingInformation::where('basic_intake_id', $basicIntake['id'])->first();
                //dd($fillingInfo);
                $basicIntake = view(
                    'admin.Ligitation.filing-form',
                    compact('fillingInfo')
                )->render();

                return response()->json([
                    'status' => 'success',
                    'output' => $basicIntake,
                ]);
            }
            return response()->json([
                'status' => 'error',
                'message' => "No file data found for this number.",
            ]);
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    public function updateFillingInfo(Request $request)
    {

        try {

            $fillingInfo = FillingInformation::find($request['fil_id']);
            if ($fillingInfo) {
                $data = [
                    'filling_date_s_c' => $request['filling_date_s_c'],
                    'amended_s_c' => $request['amended_s_c'],
                    'date_serve_s_c' => $request['date_serve_s_c'],
                    'service_complaint_s_c' => $request['service_complaint_s_c'],
                    'answer_rec' => $request['answer_rec'],
                    'answer_due_by' => $request['answer_due_by'],
                    'answer_extension' => $request['answer_extension'],
                    'default_letter' => $request['default_letter'],
                    'country' => $request['country'],
                    'filling_date_ar' => $request['filling_date_ar'],
                    'date_serve_ar' => $request['date_serve_ar'],
                    'response_rec' => $request['response_rec'],
                    'adjuster_name' => $request['adjuster_name'],
                    'adjuster_phone' => $request['adjuster_phone'],
                    'reason_to_pay' => $request['reason_to_pay'],
                ];

                $fillingInfo->update($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Filing Info saved successfuly',
                ]);
            }
            return 'reeor';
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    public function editSettlementInfo(Request $request)
    {

        try {

            $basicIntake = BasicIntake::find($request['query']);
            if ($basicIntake) {
                $settlementInfo = SettelmentJudge::where('basic_intake_id', $basicIntake['id'])->first();
                $settlementView = view(
                    'admin.Ligitation.settlement-form',
                    compact('settlementInfo')
                )->render();

                return response()->json([
                    'status' => 'success',
                    'output' => $settlementView,
                ]);
            }
            return response()->json([
                'status' => 'error',
                'message' => "No Settlemenet data found for this number.",
            ]);
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    public function savesettlementInfo(Request $request)
    {
        try {

            $settlementInfo = SettelmentJudge::find($request['set_id']);
            if ($settlementInfo) {
                $data = [
                    'decision_date' => $request['decision_date'],
                    'settlement_date' => $request['settlement_date'],
                    'settled_with' => $request['settled_with'],
                    'email_fax' => $request['email_fax'],
                    'phone_number' => $request['phone_number'],
                    'principal_term' => $request['principal_term'],
                    'principal_amount' => $request['principal_amount'],
                    'new_total' => $request['new_total'],
                    'interest_term' => $request['interest_term'],
                    'interest_amount' => $request['interest_amount'],
                    'interest_from' => $request['interest_from'],
                    'settled_other' => $request['settled_other'],
                    'fee_charged' => $request['fee_charged'],
                    'attorney_fees' => $request['attorney_fees'],
                    'other_cost' => $request['other_cost'],
                    'judgement_date' => $request['judgement_date'],
                    'additional_cost' => $request['additional_cost'],
                    'additional_interest' => $request['additional_interest'],
                    'sent_to_marshal' => $request['sent_to_marshal'],
                    'marshal_fee' => $request['marshal_fee']

                ];

                $settlementInfo->update($data);
                if (is_array($request['settlement_details'])) {
                    $array = $request['settlement_details'];
                    $newArray = array();
                    foreach (array_keys($array) as $fieldKey) {
                        foreach ($array[$fieldKey] as $key => $value) {
                            $newArray[$key][$fieldKey] = $value;
                        }
                    }
                    SettelmentJudgeDetail::where('set_id', $request['set_id'])->delete();
                    foreach ($newArray as $res) {
                        $res['set_id'] = $request['set_id'];
                        $res['basic_intake_id'] = $settlementInfo->basic_intake_id;
                        $res['provider_id'] = $settlementInfo->basicIntake->provider_id;
                        SettelmentJudgeDetail::create($res);
                    }
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Settlement Info saved successfuly',
                ]);
            }
            return 'reeor';
        } catch (\Exception $ex) {
            \Log::error($ex);
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    public function advanceSearch(Request $request){
        $filtered = array_filter($request->all());
        $basicIntakeData=BasicIntake::where($filtered)->get();
        $tableHtml = view(
            'admin.Ligitation.Include.basic-intake-table',compact('basicIntakeData')
        )->render();

        return response()->json([
            'status' => 'success',
            'tableHtml' => $tableHtml]);
    }
}

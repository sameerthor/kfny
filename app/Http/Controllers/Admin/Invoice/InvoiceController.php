<?php

namespace App\Http\Controllers\Admin\Invoice;

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
use \PDF;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider_information = ProvoiderInformation::all();
        return view('admin.Invoice.index', compact('provider_information'));
    }

    public function providerInvoices(Request $request)
    {
        $id = $request->get('id');
        $details = SettelmentJudgeDetail::where('provider_id', $id)->where('total','>',0)->get();
        if (count($details) > 0) {
            $invoiceTable = view(
                'admin.Invoice.provider-invoices',
                compact('details')
            )->render();

            return response()->json([
                'status' => 'success',
                'table' => $invoiceTable,
            ]);
        }
        return response()->json([
            'status' => 'notfound',
            'table' => "",
        ]);
    }

    public function printInvoice()
    {
        $pdf = PDF::loadView('admin.PDF.invoice');
        return $pdf->stream('invoice.pdf');
      
    }
}

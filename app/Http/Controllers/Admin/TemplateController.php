<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Templates;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Writer\HTML;

class TemplateController extends Controller
{

  public function index()
  {
    $templates = Templates::all();
    return view('admin.templates.index', compact('templates'));
  }

  public function create()
  {

    return view('admin.templates.add');
  }

  public function store(Request $request)
  {
    $file = request()->file('doc_file');
    $path = $file->store('/', ['disk' => 'public']);
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.aspose.cloud/v4.0/words/convert?format=html',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => array('Document' => new \CURLFILE(storage_path('app/public/'.$path))),
      CURLOPT_HTTPHEADER => array(
        'accept: application/json, text/plain, */*',
        'accept-language: en-US,en;q=0.9,hi;q=0.8',
        'authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYmYiOjE3MjkyNTQ2OTcsImV4cCI6MTcyOTI1ODI5NywiaXNzIjoiaHR0cHM6Ly9hcGkuYXNwb3NlLmNsb3VkIiwiYXVkIjpbImh0dHBzOi8vYXBpLmFzcG9zZS5jbG91ZC9yZXNvdXJjZXMiLCJhcGkuYmlsbGluZyIsImFwaS5pZGVudGl0eSIsImFwaS5wcm9kdWN0cyIsImFwaS5zdG9yYWdlIl0sImNsaWVudF9pZCI6IjQ5OGU0NTI5LThhOGUtNDZlYi05MGM4LWQzOGZlYmNhODI2MCIsImNsaWVudF9kZWZhdWx0X3N0b3JhZ2UiOiI1MjQyOTA1Mi1kOTJjLTQwZTQtYjVkZS0zNWQyOGVlMDcxNDkiLCJjbGllbnRfaWRlbnRpdHlfdXNlcl9pZCI6IjEwMTI3NjgiLCJzY29wZSI6WyJhcGkuYmlsbGluZyIsImFwaS5pZGVudGl0eSIsImFwaS5wcm9kdWN0cyIsImFwaS5zdG9yYWdlIl19.I5OOqrYA0kninhcJRQU-d6DF7ZZcE_rKkRFH7nzWbuG0kcw5yvMOREkFX6dgurO8ZSGT5_0DXi80fNoyQyJ0ELwJ_RNfhvHao8qXUL59Vk20H2y4Fz20GtyDQ987Mp6Caup0zb6l0bLNEFZysgSc-I8SCoTbkewaECMRx-OoTCMwt0U-3VCFiQvQViQAXXNSPRtbaAcqiIsK7K0gbNBtnpr6AX1-tQdSbrq-VliPIWBxjf4OvlM-0uxcBRIo6M3WTe71bFGF-28SunikhqpejfocOPEn_RJDhc4rJa3MKXvqctJTe3fMK86PpqXDOhQamrL4UUTCPxgLBiWB-rQL6w',
        'cookie: _gcl_au=1.1.530392115.1729244410; _gid=GA1.2.285793676.1729244410; _cookiePreferences={"analytics_storage":"granted","ad_storage":"granted","ad_user_data":"granted","ad_personalization":"granted"}; UserInfo=VXNlck5hbWU9U2FtZWVyS2hhbiZGdWxsTmFtZT1BeWFuIEtoYW4%3D; _ga=GA1.2.118180524.1729244410; _ga_DNRMJYYTHM=GS1.1.1729244434.1.1.1729245995.40.0.347206003; AWSALB=iX2X3hvGUHuuzL+C5Zvg9Hs+l9sYLSFZvgPavm+SA7mbpAN63NEJR74AUa75yNd/B0ZmmUTxJMXnui++LvSmJZmaq+ey90GEr+eqSYzrLxCQxP70v2f0L4oY5/Q8; AWSALBCORS=iX2X3hvGUHuuzL+C5Zvg9Hs+l9sYLSFZvgPavm+SA7mbpAN63NEJR74AUa75yNd/B0ZmmUTxJMXnui++LvSmJZmaq+ey90GEr+eqSYzrLxCQxP70v2f0L4oY5/Q8; _uetsid=f7bfe5808d3411efa709396f9b20028e; _uetvid=f7bff6a08d3411ef8467394a1d219aeb',
        'origin: https://api.aspose.cloud',
        'priority: u=1, i',
        'referer: https://api.aspose.cloud/v4.0/words/apiReference/op/ConvertDocument',
        'sec-ch-ua: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36'
      ),
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
      $error_msg = curl_error($curl);
    }
    curl_close($curl);

    if (isset($error_msg)) {
      dd($error_msg);
    }
    $r=Templates::create(['title'=>$request->get('title'),'content'=>$response]);
   $id=$r->id;
   return redirect("/templates/$id/edit")->with("success","Template Saved Successfuly");
  }

  public function edit($id)
  {
   $template=Templates::find($id);
   return view('admin.templates.edit', compact('template'));
  }

  public function update(Request $request,$id){
    $r=Templates::where('id',$id)->update(['title'=>$request->get('title'),'content'=>$request->get('content')]);
    return redirect("/templates/$id/edit")->with("success","Template Created Successfuly");
  }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Templates;
use Illuminate\Support\Facades\Storage;

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

    $template_name = $request->get('template_name');
    Storage::disk('public')->put("template/$template_name.docx", file_get_contents($request->doc));
    $r = Templates::create(['template_name' => $request->get('template_name'), 'file_path' => "template/$template_name.docx"]);
    $id = $r->id;
    return response(array("redirect_url" => "/templates/$id/edit"));
  }

  public function edit($id)
  {
    $template = Templates::find($id);
    return view('admin.templates.edit', compact('template'));
  }

  public function update(Request $request, $id)
  {
    $template_name = $request->get('template_name');
    Storage::disk('public')->put("template/$template_name.docx", file_get_contents($request->doc));
    $r = Templates::where('id', $id)->update(['template_name' => $request->get('template_name'), 'file_path' => "template/$template_name.docx"]);
    $id = $r->id;
    return response(array("success" => true));
  }
}

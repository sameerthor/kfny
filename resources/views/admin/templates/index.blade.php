@extends('layouts.app')
@section('content')

<div class="Patientinfo settements">
    <div class="row">
        <div class="page_title">
            Templates
        </div>
        <div class="col-md-9">
            <div class="kfnythemes_modal">

                <!-- Button trigger modal  html start-->
                <div class="button_one">
                    <a href="{{route('templates.create')}}" class="btn btn-secondary add-ProviderInformation-modal">
                        <i class="bi bi-plus-lg"></i> Add Template
                    </a>
                </div>
                <!-- Button trigger modal  html start-->



            </div>
            <div class="kfnythemes_table mt-4 ProviderInformation-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col" class="action-wrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($templates)>0)
                        @foreach($templates as $res)
                        <tr>
                            <td>{{$res['template_name']}}</td>
                            <td class="action-wrap text-center">

                                <a class="btn edit-templates-modal" href="{{ route('templates.edit',$res['id']) }}"><i class="fa fa-edit"></i></a>
                               
                                <form action="{{ route('templates.destroy', $res->id) }}" method="POST" id="delete-form-{{ $res->id }}" style="display:none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this template?')) document.getElementById('delete-form-{{ $res->id }}').submit();" class="text-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="2" class="text-center"> No template found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
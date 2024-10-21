@extends('layouts.app')
@section('content')

<div class="Patientinfo settements">
    <div class="row">
        <div class="page_title">
            Add Templates
        </div>
        <div class="col-md-9">
            <div class="kfnythemes_modal">

                <!-- Button trigger modal  html start-->
                <div class="button_one">
                    <a href="{{route('templates.index')}}" class="btn btn-secondary add-ProviderInformation-modal">
                        Back
                    </a>
                </div>
                <!-- Button trigger modal  html start-->
                <form method="post" action="{{route('templates.store')}}" enctype="multipart/form-data">

                    @csrf <div class="examAlertMsg"></div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="mb-1">Title<span class="text-danger ">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="mb-1">Upload Doc<span class="text-danger ">*</span></label>
                                <input type="file" class="form-control " name="doc_file" id="doc_file" required accept='application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document'>
                            </div>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary ">SUBMIT</button>
                </form>


            </div>

        </div>
    </div>


</div>



@endsection
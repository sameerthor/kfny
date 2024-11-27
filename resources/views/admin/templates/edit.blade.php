@extends('layouts.app')
@section('content')
<script src='/js/WebViewer/lib/webviewer.min.js'></script>
<div class="Patientinfo settements">
    <div class="row">
        <div class="page_title">
            Edit Template
        </div>
        <div class="col-md-12">
            <div class="kfnythemes_modal">
                <div class="button_one">
                    <a href="{{route('templates.index')}}" class="btn btn-secondary add-ProviderInformation-modal">
                        Back
                    </a>
                </div>
                <form id="uploadForm"> 
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <input type="text" value="{{$template->template_name}}" class="form-control" required id="template_name" name="template_name" placeholder="Enter Template Name">
                        </div>
                        <div class="col-lg-4 col-md-4">

                            <button type="submit" id="submit_button" class="btn btn-secondary">SAVE</button>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <div id='viewer' style='width: 100%; height: 80vh;border: 1px solid #80808052;'></div>
                            </div>
                        </div>

                    </div>

                </form>


            </div>

        </div>
    </div>


</div>
@endsection
@push("custom-scripts")
<script>
    WebViewer.WebComponent({
            path: '/js/WebViewer/lib', // path to the Apryse 'lib' folder on your server
            licenseKey: 'YOUR_LICENSE_KEY', // sign up to get a key at https://dev.apryse.com
            initialDoc: "{{asset('storage/'.$template->file_path) }}",
            extension: 'docx',
            enableOfficeEditing: true,
            enableFilePicker: true,
            // initialDoc: '/path/to/my/file.pdf', // You can also use documents on your server
        }, document.getElementById('viewer'))
        .then(instance => {
            const {
                documentViewer,
                annotationManager
            } = instance.Core;

            // call methods from instance, documentViewer and annotationManager as needed

            // you can also access major namespaces from the instance as follows:
            // const Tools = instance.Core.Tools;
            // const Annotations = instance.Core.Annotations;

            documentViewer.addEventListener('documentLoaded', () => {
                // call methods relating to the loaded document
            });

            $("#uploadForm").on("submit",async function(e) {
                e.preventDefault();
                const doc = documentViewer.getDocument();
                const xfdfString = await annotationManager.exportAnnotations();
                const data = await doc.getFileData({
                    // saves the document with annotations in it
                    xfdfString
                });
                const arr = new Uint8Array(data);
                const blob = new Blob([arr], {
                    type: 'application/octet-stream'
                });
                var formData = new FormData();
                formData.append('template_name', $("#template_name").val());
                formData.append('doc', blob);
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                $.ajax({
                    /* the route pointing to the post function */
                    url: "{{route('templates.store')}}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alert("Template updated successfuly");
                    }
                });
            })
        });
</script>
@endpush
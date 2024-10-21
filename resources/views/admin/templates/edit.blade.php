@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.css">

<div class="Patientinfo settements">
    <div class="row">
        <div class="page_title">
            Edit Template
        </div>
        <div class="col-md-12">
            <div class="kfnythemes_modal">

                <!-- Button trigger modal  html start-->
                <div class="button_one">
                    <a href="{{route('templates.index')}}" class="btn btn-secondary add-ProviderInformation-modal">
                        Back
                    </a>
                </div>
                <!-- Button trigger modal  html start-->
                <form method="post" action="{{route('templates.update',$template->id)}}">
                @csrf
                @method('PUT')
                     <div class="examAlertMsg"></div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label class="mb-1">Title<span class="text-danger ">*</span></label>
                                <input type="text" class="form-control" value="{{$template->title}}" name="title" id="title" required>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="mb-1">Content<span class="text-danger ">*</span></label>
                             <textarea class="form-control" name="content" id="editor"
                                    @php echo $template->content @endphp
                             </textarea>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="mb-1">Preview<span class="text-danger ">*</span></label>

                                <iframe srcdoc="" id="myFrame" style="border: 3px solid #ccc; border-radius: 5px;padding: 5px;width:100%;height:100vh">
                                </iframe>
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
@push('custom-scripts')
<script type="importmap">
    {
				"imports": {
					"ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.2.0/ckeditor5.js",
					"ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.2.0/"
				}
			}
		</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font
    } from 'ckeditor5';
    ClassicEditor
        .create(document.querySelector('#editor'), {
            plugins: [Essentials, Paragraph, Bold, Italic, Font],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        })
        .then(editor => {
            window.editor = editor;
            document.getElementById("myFrame").srcdoc = editor.getData().trim();

            handleStatusChanges(editor);

        })
        .catch(error => {
            console.error(error);
        });


    function handleStatusChanges(editor) {

        editor.model.document.on('change:data', () => {
            document.getElementById("myFrame").srcdoc = editor.getData().trim();

        });
    }
</script>
@endpush
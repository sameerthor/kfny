<div class="Patientinfo settements">
    <style>
        .kfnythemes_modal .modal-dialog {
            max-width: 90% !important;
        }

        .kfnythemes_modal .modal-header {
            background: #5f5f5f;
            color: white;
        }
    </style>
    <div class="row">
        <div class="page_title">
            Cases
        </div>
        <div class="col-md-9">
            @if(count($cases)>0)
            <div style="float: right;">
                <input type="text" placeholder="Search Case ID" class="form-control col-md-2" wire:model="searchID">
            </div>
            @endif
            <div class="kfnythemes_table mt-4 ProviderInformation-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">File ID</th>
                            <th scope="col" class="action-wrap text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cases)>0)
                        @foreach($cases as $res)
                        <tr>
                            <td>#{{$res->id}}</td>
                            <td class="action-wrap text-center">

                                <a class="btn edit-templates-modal" onclick="openIframe('{{route("litigation")}}?case_id={{$res->id}}')" href="javascript:void(0)"><i class="fa fa-eye"></i></a>

                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="2" style="text-align: center;">No Case Found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $cases->links() }}

            </div>
        </div>
    </div>
    <div class="kfnythemes_modal">
        <div class="modal fade" id="iframeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Case View</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("custom-scripts")
    <script>
        function openIframe($url) {
            var ifrm = document.createElement("iframe");
            ifrm.setAttribute("src", $url);
            ifrm.style.width = "100%";
            ifrm.style.height = "85vh";
            $("#iframeModal").find(".modal-body").append(ifrm)
            setTimeout(function() {
                $("#iframeModal").modal("show");

            }, 1500)

            ifrm.addEventListener('load', function() {
                const ifrmDoc = ifrm.contentDocument || ifrm.contentWindow.document;

                // Create a <style> tag to apply custom styles
                const style = ifrmDoc.createElement('style');
                style.textContent = `
          
                .menu_section{
                display:none;
            }
             header{
             display:none
            }
             .kfnythemes .kfnythemes_container .main_container {
     width: 100%;
}
                `;

                // Append the <style> tag to the ifrm's <head>
                ifrmDoc.head.appendChild(style);
            });

        }

        $("#iframeModal").on('hide.bs.modal', function() {
            $("#iframeModal").find(".modal-body").html("")
            Livewire.emit('refreshComponent');

        });
    </script>
    @endpush
</div>
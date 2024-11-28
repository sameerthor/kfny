@extends('layouts.app')
@section('content')
<div class="p-3">
    <div class="col-12 patient_info_heading">
        <h4>Patient Information</h4>
    </div>
    <livewire:ligitation.basic-intake.search />
    <div class="bill-data-tab-wrap">
        <div class="bill-data-tab">
            <div class="bill-data-tab-inner">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Basic Intake</a>
                    </li>
                    @if(!Auth::user()->hasRole('provider'))
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Filing Info & Discovery</a>
                    </li>
                    @endif
                    @if(!Auth::user()->hasRole('provider'))
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Motions/Trials/Arbs/Appeals</a>
                    </li>
                    @endif
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">Settlements</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-4" data-bs-toggle="tab" href="#simple-tabpanel-4" role="tab" aria-controls="simple-tabpanel-4" aria-selected="false">Files</a>
                    </li>
                    @if(!Auth::user()->hasRole('provider'))
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-5" data-bs-toggle="tab" href="#simple-tabpanel-5" role="tab" aria-controls="simple-tabpanel-5" aria-selected="false">Templates</a>
                    </li>
                    @endif
                </ul>
                <div class="tab-content   " id="tab-content">
                    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
                        <livewire:ligitation.basic-intake.add-form />
                        <livewire:ligitation.basic-intake.bill-data />

                    </div>
                    @if(!Auth::user()->hasRole('provider'))
                    <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
                        <livewire:ligitation.filing-info.form />
                    </div>
                    @endif
                    @if(!Auth::user()->hasRole('provider'))
                    <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2">
                        <livewire:ligitation.motion.form />
                    </div>
                    @endif
                    <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3">
                        <livewire:ligitation.settlement.form />
                    </div>
                    <div class="tab-pane" id="simple-tabpanel-4" role="tabpanel" aria-labelledby="simple-tab-4">
                        <livewire:ligitation.file-upload />
                    </div>
                    @if(!Auth::user()->hasRole('provider'))s
                    <div class="tab-pane" id="simple-tabpanel-5" role="tabpanel" aria-labelledby="simple-tab-5">
                        <livewire:ligitation.template />
                    </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
    <!-- main container htnl end -->
</div>
</div>

<!-- Button trigger modal -->

@endsection
@section('javascript')
<script src="{{asset('js/ligitation-livewire.js')}}"></script>
@endsection
<div>
    <div class="main_container">
        <div class="invoic_section_header">
            <div class="row">
                <div class="col-6 daylist_row">
                    <!-- <div class="day_list">
          <button class="day_button day_next">
            <i class="bi bi-arrow-left"></i>
          </button>
          <div class="day">
            Jan,2023
          </div>

          <button class="day_button day_prev">
            <i class="bi bi-arrow-right"></i>
          </button>
        </div>
        <div class="button_two">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Month
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">sun</a></li>
              <li><a class="dropdown-item" href="#">mon</a></li>
              <li><a class="dropdown-item" href="#">Tus</a></li>
            </ul>
          </div>
        </div> -->
                    @if(!in_array('employee',Auth::user()->roles->pluck('name')->toArray()))
                    <div class="button_one">
                        <button class="btn" wire:click="addTask()"><i class="bi bi-plus-lg"></i> Add Task</button>
                    </div>
                    @endif
                </div>
                <!-- <div class="col-6">
        <div class="day_span">
          <span> Today</span>
          <span>Today</span>
          <span>Today</span>
          <span>Today</span>
        </div>
      </div> -->
            </div>
        </div>
        <div class="invoic_section  list_hr">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="invoice_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#File</th>
                                    <th scope="col">Task</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Task Deadline</th>
                                    <th scope="col">Status</th>
                                    @if(!in_array('employee',Auth::user()->roles->pluck('name')->toArray()))
                                    <th scope="col">Assigned To</th>
                                    <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $res)
                                <tr>
                                    <td>#{{$res->file_no}}</td>
                                    <td>{{$res->task_type}}</td>
                                    <td>{{$res->task_notes}}</td>
                                    <td>{{$res->task_deadline}}</td>
                                    <td>
                                        @if(!in_array('employee',Auth::user()->roles->pluck('name')->toArray()))
                                        @if($res->task_status!="pending")
                                        <span class="status_Complete">Complete</span>
                                        @else
                                        <span class="status_pending">Pending</span>
                                        @endif
                                        @else
                                        <select class="custom-select" wire:change="changeStatus($event.target.value,{{$res->id}})">
                                            <option @if($res->task_status=="pending") selected @endif value="pending">Pending</option>
                                            <option @if($res->task_status=="completed") selected @endif value="completed">Completed</option>
                                        </select>
                                        @endif
                                    </td>
                                    @if(!in_array('employee',Auth::user()->roles->pluck('name')->toArray()))
                                    <td>{{$res->employee?->name}}</td>
                                    <td class="action-wrap">
                                        <a class="btn" wire:click="editTask({{$res->id}})"><i class="fa fa-edit"></i></a>
                                        <a class="delete btn" onclick="confirm('Are you sure you want to delete this task?') || event.stopImmediatePropagation()" wire:click="deleteTask({{$res->id}})"><i class="fa fa-trash"></i></a>
                                    </td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if(!in_array('employee',Auth::user()->roles->pluck('name')->toArray()))
    <div class="modal fade" id="task-popup" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-bill-popup-form-wrap">
                        <div class="add-bill-popup-form-inner">
                            <div class="add-bill-popup-form">
                                <form wire:submit.prevent="submitTaskForm" id="taskForm">
                                    <div class="form-fields row">
                                        <div class="form-group row col-6">
                                            <label for="file_no" class="col-4 col-form-label">File no</label>
                                            <div class="col-7">
                                                <select wire:model.defer="taskForm.file_no" multiple class="task-form-select custom-select ">
                                                    <option></option>
                                                    @foreach($basic_intakes as $b)
                                                    <option>{{$b['id']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="task_type" class="col-4 col-form-label">Task</label>
                                            <div class="col-7">
                                                <select wire:model.defer="taskForm.task_type" class="task-form-select custom-select ">
                                                    <option></option>
                                                    <option>DSCV Def</option>
                                                    <option>DSCV Pltf</option>
                                                    <option>PSJM</option>
                                                    <option>DSJM</option>
                                                    <option>EUO Letter</option>
                                                    <option>DEFJ Motion</option>
                                                    <option>DEFJ</option>
                                                    <option>Non-Pay Judg</option>
                                                    <option>Partial-Pay Judg</option>
                                                    <option>DSCV Motion</option>
                                                    <option>EBT Defendant</option>
                                                    <option>EBT Plaintiff</option>
                                                    <option>Vacate NOT Motion</option>
                                                    <option>Reargue Motion</option>
                                                    <option>Renew Motion</option>
                                                    <option>PF Motion</option>
                                                    <option>OPP</option>
                                                    <option>Reply</option>
                                                    <option>X-Motion</option>
                                                    <option>EUO Appearance</option>
                                                    <option>Arb</option>
                                                    <option>Appeal Brief</option>
                                                    <option>Appeal Reply</option>
                                                    <option>Master ARB</option>
                                                    <option>NOT File</option>
                                                    <option>OSC Pltf</option>
                                                    <option>OSC Def</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="task_notes" class="col-4 col-form-label">Task Notes</label>
                                            <div class="col-7">
                                                <input id="task_notes" name="task_notes" wire:model.defer="taskForm.task_notes" type="text" class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="task_deadline" class="col-4 col-form-label">Task Deadline</label>
                                            <div class="col-7">
                                                <input id="task_deadline" name="task_deadline" wire:model.defer="taskForm.task_deadline" type="text" class="form-control task-form-datepicker" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="assigned_calender" class="col-4 col-form-label">Add to Calender</label>
                                            <div class="col-7">
                                                <input id="assigned_calender" name="assigned_calender" wire:model.defer="taskForm.assigned_calender" type="checkbox" checked value="1">
                                            </div>
                                        </div>
                                        <div class="form-group row col-6">
                                            <label for="employee_id" class="col-4 col-form-label">Assigned To</label>
                                            <div class="col-7">
                                                <select wire:model.defer="taskForm.employee_id" class="task-form-select custom-select ">
                                                    <option></option>
                                                    @foreach($employees as $e)
                                                    <option value="{{ $e['id'] }}">{{$e['name'] ??'-'}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-buttons">
                                        <div class=" d-flex">

                                            <button class="btn btn-dark" type="submit">Save
                                                changes</button>
                                            <button type="button" class="btn sky-btn" data-bs-dismiss="modal">Cancel</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@push('custom-scripts')
<script>
    function matchStart(params, data) {
        if ($.trim(params.term) === '') {
            return data;
        }
        if (typeof data.text === 'undefined') {
            return null;
        }
        if (data.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
            return data;
        }
        return null;
    }

    $(document).ready(function() {
        window.addEventListener('addTask', event => {
            $("#taskForm")[0].reset()
            $('#task-popup').modal("show");
        })

        window.addEventListener('editTask', event => {
            $('#task-popup').modal("show");
        })

        window.addEventListener('saveTask', event => {

            $('#task-popup').modal("hide");
        })

        document.addEventListener("livewire:load", function(event) {

            Livewire.hook('message.processed', (el, component) => {
                $('.task-form-datepicker').datetimepicker({
                    format: 'n/j/y',
                    timepicker: false,
                    mask: false,
                    validateOnBlur: true,
                    lazyInit: true,
                    onChangeDateTime: function(dp, $input) {
                        var mod = $input.attr('wire:model.defer');

                        @this.set(mod, $input.val(), true);
                    }
                });

                $('.task-form-select').select2({
                    placeholder: 'Select an option',
                    dropdownParent: $("#task-popup"),
                    matcher: function(params, data) {
                        return matchStart(params, data);
                    }
                }).on("change", function(e) {
                    var mod = $(e.target).attr('wire:model.defer');

                    @this.set(mod, $(e.target).val(), true);

                });
            });
        });
    });
</script>
@endpush
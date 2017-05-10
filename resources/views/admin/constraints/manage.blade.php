@extends('admin.base')

@section('heading', 'Manage Constraints')

@section('body')
<div id="view_current_constraints">
    <div class="row">
        <div class="col-md-12">
            <p>View Current Constraints</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline">
                <div class="form-group">
                    <label>Date</label>
                    <input v-model="constraintDate" type="text" class="form-control bindable-datepicker" />
                </div>
                <div class="form-group">
                    <button v-on:click="fetchConstraintData" type="button" class="btn btn-primary">Show</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>&nbsp;</p>
        </div>
    </div>
    <div v-if="hasConstraintData" class="row">
        <div class="col-md-offset-1 col-md-10 well">
            <div class="row">
                <div class="col-md-2">
                    <strong>ID:</strong> @{{ constraint.id }}
                </div>
                <div class="col-md-2">
                    <strong>Date:</strong> @{{ constraint.date }}
                </div>
                <div class="col-md-2">
                    <strong>Start:</strong> @{{ constraint.start }}
                </div>
                <div class="col-md-2">
                    <strong>End:</strong> @{{ constraint.end }}
                </div>
                <div class="col-md-2">
                    <strong>40HP:</strong> @{{ constraint.num_40hp }}
                </div>
                <div class="col-md-2">
                    <strong>60HP:</strong> @{{ constraint.num_60hp }}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="create_constraint">
    <div class="row">
        <div class="col-md-12">
            <p>Create Constraint</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline">
                <div class="form-group">
                    <label>Date</label>
                    <input v-model="date" type="text" class="form-control bindable-datepicker" />
                </div>
                <div class="form-group">
                    <label>40HP</label>
                    <input v-model="num_40hp" type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <label>60HP</label>
                    <input v-model="num_60hp" type="text" class="form-control" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline">
                <div class="form-group">
                    <label>Start Hour</label>
                    <input v-model="start_hour" type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Start Minute</label>
                    <input v-model="start_minute" type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Start Second</label>
                    <input v-model="start_second" type="text" class="form-control" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-inline">
                <div class="form-group">
                    <label>End Hour</label>
                    <input v-model="end_hour" type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <label>End Minute</label>
                    <input v-model="end_minute" type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <label>End Second</label>
                    <input v-model="end_second" type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <button v-on:click="createConstraint" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr />
    </div>
</div>
<div id="create_constraints">
    <div class="row">
        <div class="col-md-12">
            <h4>Create Constraints</h4>
        </div>
    </div>
    <div class="row" v-if="messages.length > 0">
        <div class="col-md-offset-1 col-md-10">
            <div v-for="(message, index) in messages" v-bind:class="{ alert: true, 'alert-danger': message.type == 'error', 'alert-success': message.type == 'success' }">
                <button type="button" class="close" v-on:click="messages.splice(index, 1)">&times;</button>
                @{{ message.text }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>First Date</label>
                <input type="date" class="form-control" v-model="first" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Last Date</label>
                <input type="date" class="form-control" v-model="last" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Start Time</label>
                <input type="time" class="form-control" v-model="start" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>End Time</label>
                <input type="time" class="form-control" v-model="end" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>40HP</label>
                <input type="text" class="form-control" v-model="num_40hp" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>60HP</label>
                <input type="text" class="form-control" v-model="num_60hp" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <button type="button" class="btn btn-primary" v-on:click="createConstraints">Create</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr />
        </div>
    </div>
</div>
@endsection

@push('footer_scripts')
<script type="text/javascript" src="{{ asset('js/admin/manage_constraints.js') }}"></script>
@endpush

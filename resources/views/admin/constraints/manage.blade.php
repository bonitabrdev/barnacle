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
                    <input type="text" class="form-control" id="view_current_constraints_date" />
                </div>
                <div class="form-group">
                    <button v-on:click="fetchConstraintData" type="button" class="btn btn-primary">Show</button>
                </div>
            </div>
        </div>
    </div>
    <div v-if="hasConstraintData" class="row">
        <div class="col-md-offset-1 col-md-10 well">
            <div class="row">
                <div class="col-md-2">
                    <p><strong>ID:</strong> @{{ constraint.id }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer_scripts')
<script type="text/javascript" src="{{ asset('js/admin/manage_constraints.js') }}"></script>
@endpush

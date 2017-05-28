<div id="show_constraints">
    <div class="row">
        <div class="col-md-12">
            <h4>Show Constraints</h4>
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
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <button type="button" class="btn btn-primary" v-on:click="showConstraints">Show</button>
                <button type="button" class="btn btn-default" v-on:click="clearConstraints" v-if="constraints.length > 0">Clear</button>
            </div>
        </div>
    </div>
    <div class="row" v-if="constraints.length > 0">
        <div class="col-md-offset-1 col-md-10">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>40HP</th>
                        <th>60HP</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="constraint in constraints">
                        <td>@{{ constraint.id }}</td>
                        <td>@{{ constraint.date }}</td>
                        <td>@{{ constraint.start }}</td>
                        <td>@{{ constraint.end }}</td>
                        <td>@{{ constraint.data['40HP'] }}</td>
                        <td>@{{ constraint.data['60HP'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

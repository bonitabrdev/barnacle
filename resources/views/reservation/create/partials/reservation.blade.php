<div class="row">
    <div class="col-md-6">
        <h4>Reservation Information</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <barnacle-input-date
            v-model="reservation.reserved_date"
            v-bind:errors="errors.reservation.reserved_date"
            v-on:input="errors.reservation.reserved_date = []">Reserved Date</barnacle-input-date>
    </div>
    <div class="col-md-3">
        <barnacle-input-time
            v-model="reservation.start"
            v-bind:errors="errors.reservation.start"
            v-on:input="errors.reservation.start = []">Start Time</barnacle-input-time>
    </div>
    <div class="col-md-3">
        <barnacle-input-time
            v-model="reservation.end"
            v-bind:errors="errors.reservation.end"
            v-on:input="errors.reservation.end = []">End Time</barnacle-input-time>
    </div>
    <div class="col-md-3">
        <barnacle-input-text
            v-model="reservation.num_people"
            v-bind:errors="errors.reservation.num_people"
            v-on:input="errors.reservation.num_people = []">Number of People</barnacle-input-text>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <barnacle-input-text
            v-model="reservation.total_price"
            v-bind:errors="errors.reservation.total_price"
            v-on:input="errors.reservation.total_price = []">Total Price</barnacle-input-text>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Boat Type</label>
            <div class="radio">
                <label><input type="radio" name="boat_type" value="40HP" v-model="reservation.type" />40HP</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="boat_type" value="60HP" v-model="reservation.type" />60HP</label>
            </div>
        </div>
    </div>
</div>

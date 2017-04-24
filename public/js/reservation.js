// js/reservation.js
(function ( $ ) {
    $( document ).ready( function () {
        $( '#btn_reservation_slots_query' ).click( function ( evt ) {
            var year = $( '#reservation_slots_query_year' ).val();
            var month = $( '#reservation_slots_query_month' ).val();
            var day = $( '#reservation_slots_query_day' ).val();

            var url = '/reservation_slots/json/date/' + year + '/' + month + '/' + day;

            $.ajax({
                url: url,
                dataType: 'json',
                method: 'GET'
            }).done( function ( data ) {
                $( '#reservation_slots_date' ).text( data.date );

                for (let i = 0; i < data.boats.length; i++) {
                    let boat = data.boats[i];
                    let tr = $( '<tr><td>' + boat.boat_name + ' - ' + boat.boat_type + '</td></tr>' ).appendTo( '#reservation_slots_table tbody' ).get();
                    for (let j = 0; j < boat.slots.length; j++) {
                        let slot = boat.slots[j];
                        let td = $( '<td>' + slot.start_time + '</td>' ).appendTo( tr ).get();
                        $( td ).data('slot_id', slot.slot_id);
                    }
                }
            }).fail( function () {
                alert( 'Failed ajax reqeust!' );
            });
        });
    });
})( jQuery );

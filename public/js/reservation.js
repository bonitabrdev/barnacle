// js/reservation.js
(function ( $ ) {
    function ReservationSlotsTableManager( target_table, table_data ) {
        this.table = target_table;
        this.data = table_data;
        this.selections = [];
        this.created_tr = [];
    }

    ReservationSlotsTableManager.prototype.makeTable = function () {
        let tbody = $( this.table ).find( 'tbody' ).get( 0 );

        let boats = this.data.boats;
        for ( let i = 0; i < boats.length; i++ ) {
            let boat = boats[i];
            let label = boat.boat_name + ' - ' + boat.boat_type;
            let tr_str = '<tr><td>' + label + '</td></tr>';
            let tr = $( tr_str ).appendTo( tbody ).get( 0 );
            this.created_tr.push( tr );
            let slots = boat.slots;
            for ( let j = 0; j < slots.length; j++ ) {
                let slot = slots[j];
                let tooltip_str = slot.start_time + '-' + slot.end_time;
                let td_str = '<td title="' + tooltip_str + '"></td>';
                let td = $( td_str ).appendTo( tr ).get( 0 );
                $( td ).tooltip({
                    container: 'body',
                    placement: 'top'
                });
                $( td ).data( 'slot', slot );
                $( td ).click( this.cellClickHandler.bind( this ));
            }
        }
    };

    ReservationSlotsTableManager.prototype.destroyTable = function () {
        for (let i = 0; i < this.created_tr.length; i++) {
            $( this.created_tr[i] ).remove();
        }
        this.created_tr = [];
        this.selections = [];
    };

    ReservationSlotsTableManager.prototype.cellClickHandler = function ( event ) {
        let slot = $( event.target ).data( 'slot' );
        let selections_index = this.selections.indexOf( slot );
        if ( selections_index === -1 ) {
            this.selections.push( slot );
            $( event.target ).addClass( 'info' );
        } else {
            this.selections.splice( selections_index, 1 );
            $( event.target ).removeClass( 'info' );
        }
        console.log( 'Cell click handler!' );
        console.log( 'selections = ' + this.selections );
    };

    $( document ).ready( function () {
        $( '#btn_reservation_slots_query' ).click( function ( event ) {
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

                let table = $( '#reservation_slots_table' ).get( 0 );
                let manager = $( table ).data( 'manager' );
                if ( manager !== undefined ) {
                    manager.destroyTable();
                    $( table ).removeData( 'manager' );
                }
                manager = new ReservationSlotsTableManager( table, data );
                $( table ).data( 'manager', manager );
                manager.makeTable();
            }).fail( function () {
                console.log( 'Failed ajax reqeust!' );
            });
        });

        $( '#btn_save_reservation_slots' ).click( function ( event ) {
            let manager = $( '#reservation_slots_table' ).data( 'manager' );
            // sort the selections based on slot.start_time
            manager.selections.sort( function ( a, b ) {
                if ( a.start_time < b.start_time ) {
                    return -1;
                }
                if ( a.start_time > b.start_time ) {
                    return 1;
                }
                return 0;
            });
            // for now, we assume selections are contiguous (add validation later)
            let reserved_start_time = manager.selections[0].start_time;
            let reserved_end_time = manager.selections[manager.selections.length - 1].end_time;
            let reserved_num_hours = ( manager.selections.length * 30 ) / 60;
            let reserved_date = manager.data.date;
            let slot_ids = [];
            for ( let i = 0; i < manager.selections.length; i++ ) {
                slot_ids.push( manager.selections[i].slot_id );
            }
            let reserved_slots = slot_ids.join( ',' );

            $( '#reserved_slots' ).val( reserved_slots );

            $( '#reserved_date' ).text( reserved_date );
            $( '#reserved_start_time' ).text( reserved_start_time );
            $( '#reserved_end_time' ).text( reserved_end_time );
            $( '#reserved_num_hours' ).text( reserved_num_hours );

            $( '#reservation_slots_modal' ).modal( 'hide' );
        });
    });
})( jQuery );

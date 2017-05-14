// js/reservation/create/request.js

(function (requestId) {
    var fetchStatusAndRedirect = function () {
        var url = '/json/reservations/create/requests/' + requestId + '/status';
        $.ajax({
            url: url,
            dataType: 'json',
            method: 'GET'
        }).done(function (data, textStatus, jqXHR) {
            console.log('AJAX Success: ' + textStatus);
            console.log(data);
            if (data.processed) {
                if (data.reservation_id != null) {
                    window.location = '/reservations/' + data.reservation_id;
                } else {
                    window.location = '/reservations/create/failed';
                }
            } else {
                setTimeout(fetchStatusAndRedirect, 2500);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('AJAX Error: ' + textStatus);
            console.log(errorThrown);
            console.log(jqXHR);
        });
    };

    setTimeout(fetchStatusAndRedirect, 2500);
})(window.requestId);

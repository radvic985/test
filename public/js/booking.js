var guests = [];
// remove guest from list and refresh guest's index
$(document).on('click', '.trash', function () {
    guests.splice($(this).parent('tr').index(), 1);
    $(this).parent('tr').remove();
    var tr = $('.table > tbody > tr');
    if (tr.length === 0) {
        $('.table').hide();
    }
    tr.each(function (index) {
        $(this).find('td:first-child').text(index + 1);
    });
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
// clean the forms
    $('.refresh').click(function () {
        var parent = $(this).parent().parent();
        parent.find('input, select').val('');
        parent.find('.spots').hide();
    });

// add guest to the list
    $('.add-guest').click(function () {
        var guestName = $('#guest-name').val();
        var email = $('#email').val();

        if (guestName === '' || email === '') {
            $('.modal-text').text('Guest Name or Email fields are required');
            $("#modal").modal();
        } else {
            var guest = {
                'name': guestName,
                'email': email,
                'phone': null,
                'is_leader': 0
            };
            guests.push(guest);

            var row =
                "<tr>" +
                "<td>" + ($('.table > tbody > tr').length + 1) + "</td>" +
                "<td>" + guestName + "</td>" +
                "<td>" + email + "</td>" +
                "<td class='text-center trash'><span class='glyphicon glyphicon-trash text-danger' title='Remove the guest'></span></td>" +
                "</tr>";
            $(row).appendTo('.table tbody');
            $('.table').show();

            $('.guest-panel .refresh').trigger('click');
        }
    });

// show count of available spots on the current workshop
    $('#workshop').change(function () {
        $.post("/ajax/spots-number", {'workshop_id': $(this).val()}, function (data) {
            $('.spots-number').text(data);
        });

        $('.spots').show();
    });

// book workshop
    $('.book-workshop').click(function () {
        if ($('#customer-name').val() === '' || $('#phone').val() === '' || $('#workshop').val() === '') {
            $('.modal-text').text('Customer Name, Phone and Workshop fields are required');
            $("#modal").modal();
        } else {
            $.post("/ajax/spots-number", {'workshop_id': $('#workshop').val()}, function (freeSpots) {
                var availableSpots = parseInt(freeSpots) - guests.length - 1;
                if (availableSpots < 0) {
                    $('.modal-text').text('Sorry, there are only ' + freeSpots + ' more available spots for this workshop');
                    $("#modal").modal();
                }
                else {
                    var guest = {
                        'name': $('#customer-name').val(),
                        'email': null,
                        'phone': $('#phone').val(),
                        'is_leader': 1
                    };
                    guests.push(guest);

                    var bookWorkshop = {
                        'bookWorkshop': {
                            'workshop_id': $('#workshop').val(),
                            'guests_number': guests.length,
                            'weather': null
                        },
                        'guests': guests
                    };

                    $.post("/ajax/book-workshop", bookWorkshop, function (responseTxt, statusTxt) {
                            if(statusTxt === "success") {
                                $('.modal-text').text(responseTxt);
                                $("#modal").modal().on('hidden.bs.modal', function () {
                                    window.location.reload();
                                });
                            }
                            else {
                                $('.modal-text').text(responseTxt);
                                $("#modal").modal().on('hidden.bs.modal', function () {
                                    window.location.reload();
                                });
                            }
                        });
                }
            });
        }
    });
});
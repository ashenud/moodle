
<div id="pusher-alert-div" class="pusher-alert-div">
    
</div>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>

    $( document ).ready(function() {
        setInterval(function() { 
            pusher_reminder();
        }, 60000);
    });

    /* Enable pusher logging - don't include this in production */
    // Pusher.logToConsole = true;

    var pusher = new Pusher('507c54b83ec6bd6c7965', {
        cluster: 'ap2'
    });

    var pusher_channel = 'reminder-channel-<?php echo $_SESSION['id']?>';
    var pusher_event = 'reminder-event-<?php echo $_SESSION['id']?>';

    var channel = pusher.subscribe(pusher_channel);
    channel.bind(pusher_event, function (data) {
        // console.log(data);
        if(data.result == true) {
            
            var reminder_id = data.data.id;
            var reminder = data.data.reminder;
            var reminder_date = $.format.date(data.data.date, "yyyy-MM-dd HH:mm a");

            var pusher_alert = '<div id="pusher_alert_'+reminder_id+'" class="alert alert-custom alert-mdb-dismissible fade show" role="alert">' +
                                    '<button type="button" class="close alert-custom-close-btn" onclick="alert_hide('+reminder_id+')" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                    '<div>' +
                                        '<strong>Reminder!</strong>' +
                                        '<p style="margin-top: 5px;">'+reminder+'</p>' +
                                        '<p >'+reminder_date+'</p>' +
                                    '</div>' +
                                '</div>';

            $('#pusher-alert-div').prepend(pusher_alert);
        }
    });

    function pusher_reminder() {
        $.ajax({
            url: '/pages/student/php/reminder-pusher.php',
            type: 'GET',
            success: function (data) {                             
                // console.log(data);            
            }
        });        
    }

    function alert_hide(id){        
        $('#pusher_alert_'+id).alert('close');
    }

</script>
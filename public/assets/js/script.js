$(document).ready(function () {
    $('#tasksTable').DataTable({
        "pageLength": 3,
        "bLengthChange": false,
        "columnDefs": [{
            "targets": 3,
            "orderable": false
        }]
    })

    $(document).on('click',".delete-task",function (e) {
        let deleteTask = confirm('Are you sure?');
        if (!deleteTask) {
            return false;
        }
    })
});


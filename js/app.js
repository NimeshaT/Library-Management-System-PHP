$(document).ready(function () {
    $('#dtDynamicVerticalScrollExample').DataTable({
    "scrollY": "100vh",
    "scrollCollapse": true,
    });
    $('.dataTables_length').addClass('bs-select');
    });
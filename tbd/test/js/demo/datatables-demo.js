// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});

// For issuances
// $(document).ready(function() {
//     $('#issuancesTable').DataTable({
//         pageLength : 5,
//         lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
//         order: [[0, 'desc']]
//     });

// });
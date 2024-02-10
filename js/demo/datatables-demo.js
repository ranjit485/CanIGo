// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  new DataTable('#example', {
    columns: [
        { title: 'Name' },
        { title: 'Position' },
        { title: 'Office' },
        { title: 'Extn.' },
        { title: 'Start date' },
        { title: 'Salary' }
    ],
    data: dataSet
});
});

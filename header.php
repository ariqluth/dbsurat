<link rel="stylesheet" href="'.THEME_URL.'/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="'.THEME_URL.'/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="'.THEME_URL.'/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script src="'.THEME_URL.'/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script src="'.THEME_URL.'/plugins/jszip/jszip.min.js"></script>
      <script src="'.THEME_URL.'/plugins/pdfmake/pdfmake.min.js"></script>
      <script src="'.THEME_URL.'/plugins/pdfmake/vfs_fonts.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-buttons/js/buttons.print.min.js"></script>
      <script src="'.THEME_URL.'/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
      <!-- Page specific script -->
      <script>
        $(function () {
          $("#example1").DataTable({
            "paging": false,
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": [
                  {
                      extend: "excel",
                      text: \'<i class="far fa-file-excel"></i> Excel\',
                      className: "btn-light",
                      exportOptions: {
                          columns: [":not(.notexport)"],
                      }
                  },
                  {
                      extend: "pdf",
                      text: \'<i class="far fa-file-pdf"></i> PDF\',
                      className: "btn-light",
                      exportOptions: {
                          columns: ":not(.notexport)"
                      }
                  },
                  {
                      extend: "print",
                      text: \'<i class="fas fa-print"></i> Print\',
                      className: "btn-light",
                      exportOptions: {
                          columns: [":not(.notexport)"]
                      }
                  },
                  {
                      extend: "pageLength",
                      className: "btn-light"
                  },
              ]
          }).buttons().container().appendTo(\'#example1_wrapper .col-md-6:eq(0)\');
        });
      </script>
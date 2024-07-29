$(document).ready( function () {
    $('#producto_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            ],
            "ajax": {
                url: '../../controller/producto.php?op=listar',
                type: "post",
            },
            "bDestroy": true,
            "responsive": false,
            "bInfo": true,
            "iDisplayLength": 30,
            "order": [[0, "desc"]],
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de la base de datos",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                   /*  "sFirst":    "Primero", */
                    /* "sLast":    "Último", */
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
     });
});

function eliminar(usu_id) {
    Swal.fire({
        title: "Eliminar",
        text: "Esta seguro de eliminar el registro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "No",
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.isConfirmed) {

           $.post("../../controller/usuarios.php?op=eliminar", {usu_id:usu_id},function(data){
              $("#usuario_data").DataTable().ajax.reload();hgchgcgcmbbf

           });

          Swal.fire({
            title: "Eliminado!",
            text: "Eliminado correctamente.",
            icon: "success"
          });
        }
      });

          
}
$(document).ready(function() {
    
    // Setup - add a text input to each footer cell
    $('#tabela thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
    } );

    // DataTable
    var table = $('#tabela').DataTable({
        "language": {
            "lengthMenu": " ",
            "info":"Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "infoEmpty": "Mostrando 0 / 0 de 0 registros",
            "search": "Pesquisar: ",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "paginate": {
                "first": "Início",
                "previous": "Anterior",
                "next": "Próximo"
            }
          },
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
        
    });

} );
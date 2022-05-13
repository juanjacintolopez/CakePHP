<?php echo $this->Html->script('jquery-3.5.1.js') ?>
<?php echo $this->Html->script('jquery.dataTables.min.js') ?>
<?php echo $this->Html->script('dataTables.fixedHeader.min.js') ?>
<?php echo $this->Html->script('dataTables.bootstrap5.min.js') ?>
<?php echo $this->Html->css('dataTables.bootstrap5.min.css') ?>

<script>
	$(document).ready(function () {
	    // Setup - add a text input to each footer cell
	    $('#example thead tr')
	        .clone(true)
	        .addClass('filters')
	        .appendTo('#example thead');
	 
	    var table = $('#example').DataTable({
	        orderCellsTop: true,
	        fixedHeader: true,
	        language: {
	            "sProcessing":     "Procesando...",
	               "sLengthMenu":     "Mostrar _MENU_ registros",
	               "sZeroRecords":    "No se encontraron resultados",
	               "sEmptyTable":     "Ningún dato disponible en esta tabla",
	               "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	               "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	               "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	               "sInfoPostFix":    "",
	               "sSearch":         "Buscar:",
	               "sUrl":            "",
	               "sInfoThousands":  ",",
	               "sLoadingRecords": "Cargando...",
	               "oPaginate": {
	                   "sFirst":    "Primero",
	                   "sLast":     "Último",
	                   "sNext":     "Siguiente",
	                   "sPrevious": "Anterior"
	               },
	               "oAria": {
	                   "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	                   "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	               }
	        },
	        initComplete: function () {
	            var api = this.api();
	 
	            // For each column
	            api
	                .columns()
	                .eq(0)
	                .each(function (colIdx) {
	                    // Set the header cell to contain the input element
	                    var cell = $('.filters th').eq(
	                        $(api.column(colIdx).header()).index()
	                    );
	                    var title = $(cell).text();


	                    if(title!="Acciones"){
	                    	$(cell).html('<input type="text" class="form-control" placeholder="' + title + '" />');
	                    }else{
	                    	$(cell).html('');
	                    }
	 
	                    // On every keypress in this input
	                    $(
	                        'input',
	                        $('.filters th').eq($(api.column(colIdx).header()).index())
	                    )
	                        .off('keyup change')
	                        .on('keyup change', function (e) {
	                            e.stopPropagation();
	 
	                            // Get the search value
	                            $(this).attr('title', $(this).val());
	                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
	 
	                            var cursorPosition = this.selectionStart;
	                            // Search the column for that value
	                            api
	                                .column(colIdx)
	                                .search(
	                                    this.value != ''
	                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
	                                        : '',
	                                    this.value != '',
	                                    this.value == ''
	                                )
	                                .draw();
	 
	                            $(this)
	                                .focus()[0]
	                                .setSelectionRange(cursorPosition, cursorPosition);
	                        });
	                });
	        },
	    });
	});
</script>
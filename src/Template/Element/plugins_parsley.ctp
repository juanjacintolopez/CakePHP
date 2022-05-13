<?php echo $this->Html->script('jquery-3.5.1.js') ?>
<?php echo $this->Html->script('parsley.min.js') ?>

<script>
$( document ).ready(function() {

        $('#form').parsley().on('form:validate', function (formInstance) {          

            alert("click");

            var valido = formInstance.isValid();

            if(valido){
                  
                  $('button[type="submit"]').attr('data-loading-text', "<i class='fa fa-spinner fa-spin'></i>  Cargando... ");
                  $('button[type="submit"]').button('loading');
                  setTimeout(function() {
                      $('button[type="submit"]').button('reset');
                      $( 'button[type="submit"]' ).button ();
                  }, 7000); 


            }else{

                  GrowlNotification.closeAll();
                  GrowlNotification.notify({
                    title: '<label class="h_notificacion"> Notificación </label>',
                    description: '<label class="h_notificacion_texto"> La campos requeridos para este formulario no ha sido completados correctamente, <br> verifica la información. </label>',
                    type: 'error',
                    position: 'top-right',
                    visible : true,
                    closeTimeout: 9000,
                    showProgress: true,
                  });                  
            }
              
        });

});
</script>

<style type="text/css" media="screen">
  .parsley-required{
    color:red !important;
  }
</style>
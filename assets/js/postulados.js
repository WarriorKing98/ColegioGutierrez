/*=============================================
ELIMINAR MARCA
=============================================*/
$(document).on("click", ".btnDelPostulados", function(){

    var idPostulados = $(this).attr("id");
    
    Swal.fire({
      title: '¿Está seguro de eliminar la Postulacion?',
      text: "¡De lo contrario cancele la acción!",
      icon: "question",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=postulados/postulados&id="+idPostulados;
  
      }
  
    })
  
  })
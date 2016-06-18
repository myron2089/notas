<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- DATATABLES -->

<script src="{{ asset('/js/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/datatables.bootstrap.min.js') }}" type="text/javascript"></script>
<!-- SELECT 2 SCRIPT -->

<script src="../bootstrap/select2/js/select2.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() { 
     $("#carr").select2();
     $("#gradeSSS").select2();
     $("#sectionSSS").select2();
     $("#encargado").select2();
     $("#sexSSS").select2();
});

//Abris los <select> al seleccionarlos
 $(document).on('focus', '.select2', function() {
    $(this).siblings('select').select2('open');
});

 $(document).on('focus', '#grade', function() {
    $(this).siblings('select').select2('open');
});
</script>

<!-- SELECT 2 SCRIPT -->


<script src="{{ asset('/js/dataTables.editor.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/dataTables.select.min.js') }}" type="text/javascript"></script>



<script src="{{ asset('/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>


<!-- CREAR UN ESTUDIANTE -->
<script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$('#saverecord').click(function(e){

            e.preventDefault();
            

            var err = 0;
            var divmsg;
            if($('#fname').val()== '') 
            {
                err =1;
                $('#fname').select();
                divmsg = document.getElementById('msg-fname'); 
            }
            else
            if($('#lname').val()== '') 
            {
                err =2;
                $('#lname').select();
                divmsg = document.getElementById('msg-lname'); 
            }
            else
            if($('#sex').val()==0) 
            {
                err =3;
                $('#sex').focus();
                divmsg = document.getElementById('msg-sex'); 
            }
            else
            if($('#personalc').val()=='') 
            {
                err =4;
                $('#personalc').select();
                divmsg = document.getElementById('msg-perc'); 
            }
            else
            if($('#address').val()=='') 
            {
                err =4;
                $('#address').select();
                divmsg = document.getElementById('msg-address'); 
            }
            else
            if($.isNumeric($('#phone').val())==false || $("#phone").val().length!=8) 
            {
                err =4;
                $('#phone').select();
                divmsg = document.getElementById('msg-phone'); 
            }
            else
            if($.isNumeric($('#phone').val())=='') 
            {
                err =4;
                $('#phone').select();
                divmsg = document.getElementById('msg-phone'); 
            }

             // Mostrar los mensajes si faltal datos
            if(err > 0)
            {
                 $(divmsg).fadeIn(1000, function(){
                            setTimeout(function(){
                                $(divmsg).fadeOut("slow");
                            },4000);
                            });

                return false;
            }
           

           /* var fname = $('#fname').val();
            var lname = $('#lname').val();
            var sex = $('#sex').val();
            var born = $('#born').val();
            var pcod = $('#personalc').val();
            var address = $('#address').val();
            var phone = $('#phone').val();
            var enc = $('#encargado').val();
            var carr = $('#carrera').val();
            var grade = $('#grado').val();
            var section = $('#section').val();*/
            $_token = "{{ csrf_token() }}";



            var form = $('#form-create');
            var data = form.serialize();
            var action = $('#action').val();
            var url;

            if(action=='c')
            {
                url= "<?= URL::to('savedata') ?>";
            }
            else if(action=='e')
            {
                url= "<?= URL::to('editdata') ?>";
            }
             
             
             $.post(url, data, function(result){

               //alert(result);
              $("#lbl-msg").empty();
              $("#lbl-msg").append(result);
              $('#modal-msg-st').modal('show');

            });


            
        });


</script>
<!-- CREAR ENCARGADOS -->
<script type="text/javascript">
    $('#saverecordm').click(function(e){
             e.preventDefault();
            var form = $('#form-create');
            var data = form.serialize();
            var action = $('#action').val();
            var url;
            if(action=='c')
            {
                url= "<?= URL::to('saveMandated') ?>";
            }
            else if(action=='e')
            {
                url= "<?= URL::to('saveMandated') ?>";
            }
             
             
             $.post(url, data, function(result){

               alert(result + '   ' + action);

            });


    });



</script>


<!-- MOSTRAR MODAL PARA EDITAR -->
<script type="text/javascript">
    
      //EDITAR ALUMNO

      $('.getmodaledit').click(function(e){
       // alert(0);
      var id= $(this).attr("value"); 

       $.get('getstbyid/'+id, function(data){
        //alert(data[0].Nombre);

        $('#fname').attr('value', data[0].Nombre);
        $('#lname').attr('value', data[0].Apellidos);
        $('#address').attr('value', data[0].Direccion);
        $('#born').attr('value', data[0].FechaNac);
       // $("#sex").attr('value', data[0].Sexo);
       if(data[0].Sexo =='F')
       {
        //alert(data[0].Sexo);
        document.getElementById("sexf").checked = true;
        document.getElementById("sexm").checked = false;
        $( "#lblm" ).removeClass( "active" );
        $( "#lblf" ).addClass( "active" );
       }
       else
       {
        document.getElementById("sexf").checked = false;
        document.getElementById("sexm").checked = true;
        $( "#lblf" ).removeClass( "active" );
        $( "#lblm" ).addClass( "active" );
       }
        
        
        $('#personalc').attr('value', data[0].CodPer);
        $('#phone').attr('value', data[0].Telefono);
        $('#encargado').val(data[0].Encargado_CodEncargado).change();
        $("#carr").attr('value', data[0].Carrera);
        $("#grade").attr('value', data[0].Grado);
        $("#section").val(data[0].Seccion_CodSeccion).change();
        $("#ids").attr('value', id);

        $("#encargado").select2();


       });
        
        
       $('#modal-edit').modal('show');

      });


</script>
<!-- MOSTRAR MODAL PARA EDITAR -->
<script type="text/javascript">
    
      //EDITAR NOTAS

      
          $('#nota1').keydown(function(e) {
            var cant = $('#nota1').val();
            alert( "Handler for .keydown() called."+ cant );
          });

</script>

<!-- MODAL PARA MOSTRAR MATERIAS POR GRADO -->
<script type="text/javascript">
   $('.btn-getmats').click(function(e){
    $('#modal-matters').modal('show');
   
     var id = $(this).attr('data-value');
   
    $("#carrera").attr('value', id);

$( ".lmats" ).remove();
    $.get('getmatbygra/'+id, function(data){
       
       data.forEach(function(response) {

      $("#mat-list").append("<li class='lmats'><a>" + response.Materia + "</a></li>");
    });
   });

  
  });

</script>
<!-- DROPDOWNS DINAMICOS GRADOS   -->
<script type="text/javascript">


//GRADOS
    $("#carr").change(function(event){
        $.get("grados/"+event.target.value+"",function(response, state){
            console.log(response);
            //limpiar select
            $("#grade").empty();
            //llenar
            $("#grade").append("<option value='0'>Seleccionar Grado</option>");
            for(i=0; i<response.length; i++)
            {
                $("#grade").append("<option value='"+response[i].CodGrado+"'> "+response[i].Grado+"</option>");

            }
            $("#grade").val(0).change();
        });


    });


</script>

<!-- DROPDOWNS DINAMICOS MATERIA   -->
<script type="text/javascript">


//GRADOS
    $("#grade").change(function(event){
        $.get("materias/"+event.target.value+"",function(response, state){
            console.log(response);
            //limpiar select
            $("#mat").empty();
            //llenar
            $("#mat").append("<option value='0'>Seleccionar Materia</option>");
            for(i=0; i<response.length; i++)
            {
                $("#mat").append("<option value='"+response[i].CodMateria+"'> "+response[i].Materia+"</option>");

            }
            $("#mat").val(0).change();
        });


    });


</script>


<!--  DATATABLES -->
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "dom": '<"top"i>rt<"bottom"flp><"clear">',
      "fixedColumns": true
    });
    
    $('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "dom": '<"top"i>rt<"bottom"flp><"clear">',
      "hover": true,
    
    });
    /*Notas de los estudiantes*/
    $('#studentsc').DataTable({
       "searching": true,
       "ordering": true,
       "info": true,
       "lengthChange": false,

    });




  });

 
</script>

<!-- OBTENER LOS ALUMNOS PARA INGRESAR NOTAS-->
<script type="text/javascript">
  $('#btngetSts').click(function(e){
    e.preventDefault();
   var codcarr = $('#carr').val();
   var codgra =  $('#grade').val();
   var codmat =  $('#mat').val();
   var codcic =  $('#cicle').val();
   var codsec =  $('#section').val();
     var url= "<?= URL::to('getStudentsBygrade') ?>";
     var data = { 
                grade: codgra,
                section: codsec,
                mat: codmat,
                cic: codcic,
                bim: 1
              };
 
    $.get(url, data,function(response, state){
            console.log(response);
            //limpiar select
            
            var table = $("#studentsc tbody");
            table.empty()
    $.each(response, function(idx, elem){
        table.append("<tr><td>"+elem.CodAsignacion+"</td>"+
          "<td>"+elem.Apellidos+ " "+elem.Nombre+"</td>"
          +"<td><input maxlength='3'  class='txt-nota input-edit'  id='sc1' name='1' value='"+elem.Nota1+"'></td><td>"+elem.Nota2+"</td><td>"+elem.Nota3+"</td><td>"+elem.Nota4+"</td></tr>");
   
    });
     
   
           
        });


  });


</script>




<!-- REGISTRAR NOTAS (CADA VEZ QUE SE ACTUALICE UNA) -->
<script type="text/javascript">
 

/*SLECCIONAR TODO EL TEXTO CUANDO SE SELECCIONE EL INPUT*/
    $('.input-edit').focus(function(e) {
     
      /*Guardar la variable seleccionada para determinar si ha cambiado e ir a la funcion guardar nota*/
      text = this.value;

   $(this).select();
});

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('value')
        }
    });
  $('.input-edit').blur(function(e) {
    var score = this.value;
/*Si el valor cambio*/
if(score != text)
{

 $('#img-load').css('display', 'block').animate();
    // trap the return key being pressed
   var $d = $(this).parent("td");
   var col = $d.parent().children().index($d);
   var row = $d.parent().parent().children().index($d.parent());
   var MyRows = $('table#studentsc').find('tbody').find('tr');
   var MyIndexValue = $(MyRows[row]).find('td:eq(0)').html();
   var codasig = $(MyRows[row]).find('td:eq(0)').html();
  
   var codcarr = $('#carr').val();
   var codgra =  $('#grade').val();
   var codmat =  $('#mat').val();
   var codcic =  $('#cicle').val();
   var codsec =  $('#section').val();
   var bime = $(this).attr("name");
 // alert(0);
   var url= "<?= URL::to('saveScores') ?>";
   var data = { score: score,
                codcar: codcarr,
                casig: codasig,
                cmat: codmat,
                ciclo: codcic,
                bim: bime };

 
  //alert(codmat + ' ' + codcarr + '  ' + data[0] );
      
   /*   if(this.value>100)
      {
      /* alert('El valor ingresado es mayor al valor permitido');*/
    /*   $(this).addClass( 'input-edit-e' );
        $(this).select();
       
        return false;
        
      }
      else
      { */
     //   $(this).removeClass( 'input-edit-e' );

     $.post(url, data, function(result){

            //   alert(result);
                setTimeout(
                  function() 
                  {
                    $('#img-load').css('display', 'none');
                    $("#lbl-msg").html(result);
                    $('#modal-msg').modal('show');
                  }, 800);

            });
        
        

setTimeout(
  function() 
  {

   $('#modal-msg').modal('hide');
  }, 800);
return false;
} 
else{
  alert(text + "No cabmio " + " " + row + " " + col);
}
      
  });

</script>

<script type="text/javascript">
  $('.input-edit').keypress(function (e) {
  if (e.which == 13) {
     $(this).blur();
  }
});
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
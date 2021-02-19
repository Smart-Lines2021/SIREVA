$(document).ready(function(){
    $("#estadoId").change(function(){
      var estado = $(this).val();
    
      $.get('https://api-sepomex.hckdrk.mx/query/get_municipio_por_estado/'+estado, function(data){
        //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
        //console.log(data);
       // console.log(data['response']['municipios'].length);
          var municipios_select = '<option selected="selected" value="">Seleccione municipio</option>';
        
            for (var i=0; i<data['response']['municipios'].length;i++)
            
              municipios_select+='<option value="'+data['response']['municipios'][i]+'">'+data['response']['municipios'][i]+'</option>';

            $("#municipios").html(municipios_select);

      });
    });
  });


  $(document).ready(function(){
    $("#municipios").change(function(){
      var municipio = $(this).val();
    
      $.get('https://api-sepomex.hckdrk.mx/query/get_cp_por_municipio/'+municipio, function(data){
        //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
          var codigos_postales_select = '<option selected="selected" value="">Seleccione Código Postal</option>';
        
            for (var i=0; i<data['response']['cp'].length;i++)
        
              codigos_postales_select+='<option  value="'+data['response']['cp'][i]+'">'+data['response']['cp'][i]+'</option>';

            $("#codigos_postales").html(codigos_postales_select);

      });
    });
  });

  $(document).ready(function(){
    $("#codigos_postales").change(function(){
      var codigo_postal = $(this).val();
    
      $.get('https://api-sepomex.hckdrk.mx/query/get_colonia_por_cp/'+codigo_postal, function(data){
        //esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
          var colonias_select =  '<option selected="selected" value="">Seleccione Colonia</option>';
        
            for (var i=0; i<data['response']['colonia'].length;i++)
        
              colonias_select+='<option value="'+data['response']['colonia'][i]+'">'+data['response']['colonia'][i]+'</option>';

            $("#colonias").html(colonias_select);

      });
    });
  });

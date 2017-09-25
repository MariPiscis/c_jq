// $(document).ready(function(){

    $(function(){
    getEmpleados();

    $('#btncerrar').click(function(){
        location.reload();
    });

    $('#btnagregar').click(function(){
        $('#mymodal').modal('show');
        $('#mymodal').find('.modal-title').text('Agregando Nuevos Empleados de la CONAFOR');
        $('#myform').attr('action', 'http://localhost/crudcodeigniter/empleados_controller/addEmpleados');
        $('input[name=numero_empleado]').val('');
        $('input[name=nombre]').val('');
        $('input[name=apellido1]').val('');
        $('input[name=apellido2]').val('');
        $('select[name=plaza]').val('');
        $('select[name=activo]').val('');
        $('input[name=id]').val('');
    });

    $('#btnguardar').click(function(){
        var url = $('#myform').attr('action');
        var data = $('#myform').serialize();
        
        //validando formulario

        var numero_empleado = $('input[name=numero_empleado]');
        var nombre = $('input[name=nombre]');
        var apellido1 = $('input[name=apellido1]');
        var plaza = $('select[name=plaza]');
        var activo = $('select[name=activo]');
        var result = '';

        if(numero_empleado.val()==''){ numero_empleado.parent().parent().addClass('has-error'); } 
            else{ numero_empleado.parent().parent().removeClass('has-error');   result +='1';   }

        if(nombre.val()==''){ nombre.parent().parent().addClass('has-error'); }
            else{ nombre.parent().parent().removeClass('has-error');    result +='2';}

        if(apellido1.val()==''){ apellido1.parent().parent().addClass('has-error'); }
            else{ apellido1.parent().parent().removeClass('has-error');    result +='3';}

        if(plaza.val()==''){ plaza.parent().parent().addClass('has-error'); }
            else{ plaza.parent().parent().removeClass('has-error');    result +='5';}

        if(activo.val()==''){ activo.parent().parent().addClass('has-error'); }
            else{ activo.parent().parent().removeClass('has-error');    result +='6';}

        if(result=='12356'){
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                    
                    if(response.success){
                        $('#mymodal').modal('hide');
                        $('#myform')[0].reset();
                        if(response.type=='add'){
                            var type = 'Agregado'
                        }else if(response.type=='update'){
                            var type ="Actualizado"
                        }
                        $('.alert-success').html('Empleado '+type+' Correctamente').fadeIn().delay(4000).fadeOut('slow');
                        getEmpleados();
                    }else{
                        // $('.alert-danger').html('Ningun Dato '+response.type).fadeIn().delay(1000).fadeOut('slow');
                        // getEmpleados();
                        alert('Ningun Dato '+response.type);
                        location.reload();
                    }
                },
                error: function(){
                    alert('Error al cargar datos, el numero de control ya existe');
                }
            });
        }
    });


    $('#mostrar_datos').on('click', '.item-edit', function(){
        var id = $(this).attr('data');
        $('#mymodal').modal('show');
        $('#mymodal').find('.modal-title').text('Editar Empleados');
        $('#myform').attr('action', 'http://localhost/crudcodeigniter/empleados_controller/updateEmpleados');
        
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: 'http://localhost/crudcodeigniter/empleados_controller/editEmpleados',
            data: {id: id},
            async: false,
            dataType: 'json',
            success: function(data){  
                $('input[name=numero_empleado]').val(data.numero_empleado);
                $('input[name=nombre]').val(data.nombre);
                $('input[name=apellido1]').val(data.apellido1);
                $('input[name=apellido2]').val(data.apellido2);
                $('select[name=plaza]').val(data.plaza);
                $('select[name=activo]').val(data.activo);
                $('input[name=id]').val(data.id);
                                               
            },
            error: function(){
                alert('Error al Editar Empleado');
            }
        });
    });


    $('#mostrar_datos').on('click', '.item-delete', function(){
        var id = $(this).attr('data');
        $('#deleteModal').modal('show');
        $('#btnDelete').unbind().click(function(){
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: 'http://localhost/crudcodeigniter/empleados_controller/deleteEmpleados',
                data:{id:id},
                dataType: 'json',
                success: function(response){
                    if(response.success){
                        $('#deleteModal').modal('hide');
                        $('.alert-success').html('Empleado Eliminado Correctamente').fadeIn().delay(4000).fadeOut('slow');
                        getEmpleados();
                        // window.location.reload(true);
                    }else{
                        alert('Error');
                    }
                },
                error: function(){
                    alert('Error al Eliminar');
                }
            });
        });
    });


    function getEmpleados(){
        $.ajax({
            type: 'ajax',
            url: 'http://localhost/crudcodeigniter/empleados_controller/getEmpleados',
            async: false,
            dataType: 'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html +='<tr>'+
                                '<td>'+data[i].numero_empleado+'</td>'+
                                '<td>'+data[i].nombre+" "+data[i].apellido1+" "+data[i].apellido2+'</td>'+
                                '<td>'+data[i].nombre_plaza+'</td>'+
                                '<td>'+data[i].unidad_administrativa+'</td>'+
                                '<td>'+
                                    '<a href="javascript:;" class="btn btn-success item-edit" data="'+data[i].id+'"><span class="glyphicon glyphicon-pencil"></span>Editar</a>'+
                                    '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'"><span class="glyphicon glyphicon-remove-sign"></span>Eliminar</a>'+
                                '</td>'+
                            '</tr>';
                }
                $('#mostrar_datos').html(html);
            },
            error: function(){
                alert('Error no se puede mostrar el Cont. de la BD');
            }
        });
    }
    
});
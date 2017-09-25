<div class="container">
        <div class="starter-template">
            <p class="lead" align="center"> <b>Empleados de la CONAFOR</b> </p>
            <button id="btnagregar" type="button" class="btn btn-primary btn-lg" >
                <span class="glyphicon glyphicon-plus-sign"></span> Agregar Empleados
            </button>
        </div>

    <div class="alert alert-success" style="display: none;"> </div>

    <div class="panel panel-default"> 
    <div class="panel-heading" align="center"><b>LISTA DE EMPLEADOS</b></div>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<th>Numero Empleado</th>
				<th>Nombre Completo</th>
        <th>Plaza</th>
        <th>Unidad Administrativa</th>
        <th>Opcion</th>
			</tr>
		</thead>
		<tbody id="mostrar_datos">

		</tbody>
	</table>
</div>
</div>

<div id="mymodal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        	<form id="myform" action="" method="post" class="form-horizontal">
        		<input type="hidden" name="id" value="0">
        		
              <div class="form-group">
                <label for="name" class="label-control col-md-4">Numero Empleado:</label>
                  <div class="col-md-10">
        			      <input type="number" name="numero_empleado" class="form-control" placeholder="Numero De Empleado">
        			    </div>
        		  </div>

        		  <div class="form-group">
        			  <label for="name" class="label-control col-md-4">Nombre:</label>
        			    <div class="col-md-10">
        				    <input type="text" name="nombre"  MAXLENGTH="20" class="form-control" placeholder="Nombre">
        			    </div>
        		  </div>

              <div class="form-group">
        			  <label for="name" class="label-control col-md-4">Apellido1:</label>
        			    <div class="col-md-10">
        				    <input type="text" name="apellido1" MAXLENGTH="40" class="form-control" placeholder="Primer Apellido">
        			    </div>
        		  </div>

              <div class="form-group">
        			  <label for="name" class="label-control col-md-4">Apellido2:</label>
        			    <div class="col-md-10">
        				    <input type="text" name="apellido2" MAXLENGTH="40" class="form-control" MAXLENGTH="40" placeholder="Segundo Apellido">
        			    </div>
        		  </div>
                
              <div class="form-group">
                <label for="name" class="label-control col-md-4">Plaza:</label>
                  <div class="col-md-10">
                    <select name="plaza" class="form-control" >
                      <!-- <option value="0">-- Seleccionar --</option> -->
                      <?php foreach ($plazas as $plaza): ?>
                        <option value="<?php echo $plaza->idP; ?>"><?php echo $plaza->nombre_plaza; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
              </div>
           
              <div class="form-group">
        			  <label for="name" class="label-control col-md-4">Estado:</label>
        			    <div class="col-md-10">
                    <select name="activo" class="form-control" >
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
        			    </div>
        		  </div>

        	</form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button> -->
        <button type="button" class="btn btn-default" id="btncerrar" >Cerrar</button>
        <button type="button" id="btnguardar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmar Eliminacion de Empleados</h4>
      </div>
      <div class="modal-body">
        	Esta seguro de Eliminar Este Registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
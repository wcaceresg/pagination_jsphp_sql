<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex"‎>
    <meta name="googlebot" content="noindex"‎>	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="paginacion">
    <meta name="author" content="Ing. Walther Cáceres">
    <meta name="keyword" content="paginacion V1">

	<title>Paginación</title>
	<style>

	</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="jumbotron col-12 text-center">
  <h1 class="display-4">Ejemplo Paginación </h1>
  <p class="lead">Php, javascript y sql server.</p>
 
 
</div>

	<div class="col-sm-12 col-md-12">
		<div class="dataTables_length" id="filtrocontrato"><label>Mostrar 
			<select name="filtrocontrato" aria-controls="filtrocontrato"  id="slct_limitador_contrato" class="form-control form-control-sm select-limitador" onchange="obtenerContratos(1)">
				<option value="10">10</option>
				<option value="25">25</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select> Contratos</label>
		</div>
	</div>
	<table class="table  table-striped">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Documento</th>
			<th scope="col">Importe</th>
			
			</tr>
		</thead>
		<tbody id="cuerpo">
			
		</tbody>
		<tfoot>
          <tr>
            <td colspan="7" id="tfootpaging"></td>
          </tr>
        </tfoot>

	</table>
</div>
</body>
</html>
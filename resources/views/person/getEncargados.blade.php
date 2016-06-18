@extends('layouts.app')

@section('htmlheader_title')
    Crear Nuevo
@endsection


@section('main-content')
<div class="container">
	

				<div class="row">
					<div class="col-sm-12">
						<table id="example1" name="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">

               			 <thead>
			                <tr role="row">
			                	<th id="column1" class="hidden" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nombre: activate to sort column descending" style="width: 295px;">Codigo
			                	</th>
			                	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nombre: activate to sort column descending" style="width: 295px;">Nombre
			                	</th>
			                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361px;">Direccion</th>
			                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 321px;">Telefono</th>
			                	
			                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">Acciones</th>
			                </tr>
			            </thead>

		                <tbody>
		                                
		                
		                 	@foreach($encargados as $st)
        					<tr role="row" class="odd">
        						<td class="hidden">{{ $st->CodEncargado }}</td>
        						<td class="sorting_1">{{ $st->Nombre }}</td>
        						<td>{{$st->Direccion}}</td>
        						<td>{{ $st->Telefono }}</td>
        						<td>
        						<button id="getmodaledit" name="getmodaledit" class="btn btn-xs btn-primary getmodaledit" data-toggle="modal" data-tip="this is the tip!">
        							Verdatos
        						</button>

        						<button id="getmodaledit" name="getmodaledit" class="btn btn-xs btn-info getmodaledit" data-toggle="modal"
        						value="{{$st->CodEncargado}}">
        							Editar
        						</button>
        						</td>

        						
        						

        						
 							</tr>
    						@endforeach
		                  
		                </tbody>
            <!--   <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot>  -->
              </table></div>
              </div>

              
				
			</div>
		</div>

		<!-- Modal -->
<div id="modal-edit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Editar Estudiante</h4>
      </div>

      @yield('forme')
    
    </div>
  </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">
  Launch demo modal
</button>

@endsection
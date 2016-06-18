@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">
				 @foreach($carreras as $carrs)
         
          <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{$carrs->Carrera}}</h3>
              <h5 class="widget-user-desc">55 Estudiantes Registrados</h5>
            </div>
            <div class="box-footer no-padding">
           
              <ul class="nav nav-stacked">
              @foreach($carrs->grado as $gra)
                <li><a href="#">
                    
                      {{$gra->Grado}}o.
                   
              <!-- <span class="pull-right badge bg-blue">31</span>--><button data-value="{{$gra->CodGrado}}" class="btn btn-xs btn-info btn-getmats" id="bnt-mats">Ver Materias</button></a>
              </li>
              @endforeach
                
               <!-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        

         @endforeach

		</div>

	</div>

  <!-- Modal -->
<div id="modal-matters" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Materias de </h4>
      </div>
      <input type="text" name="carrera" id="carrera">
        <ul class="nav nav-stacked" id="mat-list">
          <li>
            <a> 
            Materia 1
            </a>
          </li>
        </ul>
    
    </div>
  </div>
</div>
@endsection

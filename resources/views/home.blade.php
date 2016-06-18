@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">
				

		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Estudiantes</h3>
              <h5 class="widget-user-desc">55 Estudiantes Registrados</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Registrar Estudiante(a) <!-- <span class="pull-right badge bg-blue">31</span>--></a></li>
                <li><a href="#">Mostrar todos los Estudiantes <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
                <li><a href="#">Promover Estudiantes <!--<span class="pull-right badge bg-green">12</span>--></a></li>
               <!-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Catedráticos</h3>
              <h5 class="widget-user-desc">Administración de Catedráticos</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Registrar Catedráticos <!-- <span class="pull-right badge bg-blue">31</span>--></a></li>
                <li><a href="#">Ver Catedráticos <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
                <li><a href="#">Asignar Catedráticos <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
               <!--  <li><a href="#">Promover Alumnos <span class="pull-right badge bg-green">12</span></a></li>-->
               <!-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-gray">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Notas</h3>
              <h5 class="widget-user-desc">Administración de Notas</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Registrar Notas <!-- <span class="pull-right badge bg-blue">31</span>--></a></li>
                <li><a href="#">Imprimir Notas <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
                <li><a href="#">Imprimir Certificados <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
               <!--  <li><a href="#">Promover Alumnos <span class="pull-right badge bg-green">12</span></a></li>-->
               <!-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        

		

	</div>


	<div class="col-md-12">
		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Materias</h3>
              <h5 class="widget-user-desc">Administración de Materias</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Registrar Materia <!-- <span class="pull-right badge bg-blue">31</span>--></a></li>
                <li><a href="homemats">Mostrar todas las Materias <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
                <li><a href="#">Asignar Materia a Catedráticos <!--<span class="pull-right badge bg-green">12</span>--></a></li>
               <!-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>


		

		<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Amdinistración</h3>
              <h5 class="widget-user-desc">Administración de Carreras</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Carreras <!-- <span class="pull-right badge bg-blue">31</span>--></a></li>
                <li><a href="#">Grados <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
                <li><a href="#">Secciones <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
               <!--  <li><a href="#">Promover Alumnos <span class="pull-right badge bg-green">12</span></a></li>-->
               <!-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-gray">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Varios</h3>
              <h5 class="widget-user-desc">Operaciones varias</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Imprimir listado de Estudiantes <!-- <span class="pull-right badge bg-blue">31</span>--></a></li>
                <li><a href="#">Carta de Buena Conducta <!--<span class="pull-right badge bg-aqua">5</span>--></a></li>
               <!--  <li><a href="#">Promover Alumnos <span class="pull-right badge bg-green">12</span></a></li>-->
               <!-- <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li> -->
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        

			</div>
		</div>
	</div>
@endsection

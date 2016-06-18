
@section('htmlheader_title')
    Crear Nuevo
@endsection
 @include('score.partials.setscorebim')

@section('form-sc')
<div class="container">
  

        <div class="row">
        <!-- BOTONES PARA SELECCIONAR CARRERA, GRADO, SECCION Y MATERIA -->
        {!!Form::open(['action' => 'ScoreController@setScores', 'method'=>'GET', 'class'=> 'form-horizontal', 'role'=>'search'])!!}
       
        <div class="col-sm-12">
          <div class="col-sm-4">
              <label for="carr">Carrera</label>
              <select  class="form-control dd-modded" id="carr" name="carr" value="{{ old('carr') }}">
                   <option value="0">Seleccionar</option>
                    @foreach($carreras as $carrs)
                    <option @if(app('request')->input('carr')==$carrs->CodCarrera)
                              selected
                              {{$ncarr = $carrs->Carrera}}
                            @elseif(app('request')->input('grade')==null)
                            {{$ncarr = "No seleccionada"}}
                          
                            @endif
                     value="{{$carrs->CodCarrera}}">{{$carrs->Carrera}}</option>
                    @endforeach
              </select>
          </div>
          <div class="col-sm-4">
              <label class="control-label">Grado</label>
              <select  class="form-control" id="grade" name="grade" value="{{ old('grado') }}">
              <option value="0">Seleccionar Grado</option>
               @foreach($grados as $gra)
                    <option @if(app('request')->input('grade')==$gra->CodGrado)
                              selected
                              {{$ngrade = $gra->Grado}}

                            @elseif(app('request')->input('grade')==null)
                            {{$ngrade = "No seleccionado"}}
                            @endif
                     value="{{$gra->CodGrado}}">{{$gra->Grado}}</option>
                    @endforeach
                @if(app('request')->input('grade')==null || app('request')->input('grade')==0)
                  {{$ngrade = "No seleccionado"}}
                @endif
              </select>
          </div>
          <div class="col-sm-4">
            <label for="section" class="control-label">Sección</label>
            <select  class="form-control" id="section" name="section" value="{{ old('type') }}">
                <option  value="0">Seleccionar</option>
                @foreach($sections as $sect)
                  <option  @if(app('request')->input('section')==$sect->CodSeccion)
                              selected
                              {{$nsec = $sect->Seccion}}
                              @elseif(app('request')->input('section')==null)
                            {{$nsec= "No seleccionado"}}
                          @endif value="{{$sect->CodSeccion}}">{{$sect->Seccion}}</option>
                @endforeach
                @if(app('request')->input('section')==null || app('request')->input('section')==0)
                  {{$nsec = "No seleccionada"}}
                @endif
            </select>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="col-sm-4">
            <label for="mat" class="control-label">Materia</label>
            <select  class="form-control" id="mat" name="mat" value="{{ old('mat') }}">
                <option value="0">Seleccionar Materia</option>
                 @foreach($materias as $mats)
                  <option  @if(app('request')->input('mat')==$mats->CodMateria)
                              selected
                              {{ $mate = $mats->Materia}}
                          @elseif(app('request')->input('mat')==null)
                            {{$mate = "No seleccionada"}}
                          @endif value="{{$mats->CodMateria}}">{{$mats->Materia}}</option>
              
                @endforeach
                @if(app('request')->input('mat')==null || app('request')->input('mat')==0)
                  {{$mate = "No seleccionada"}}
                @endif
            </select>
          </div>
          <div class="col-sm-4">
            <label for="cicle" class="control-label">Ciclo</label>
            <select  class="form-control input-xs" id="cicle" name="cicle" value="{{ old('mat') }}">
                <option value="0">Seleccionar</option>
                {{$i = 0}}
                @foreach($ciclos as $ciclo)
                   
                                        <option 
                                        @if(app('request')->input('cicle')==$ciclo->CodCiclo)
                                          selected
                                        {{$i=1}}
                                        @endif
                                        @if($i==0)
                                          @if($ciclo->Ciclo == date("Y"))
                                          selected
                                          @endif
                                        @endif
                                          value="{{$ciclo->CodCiclo}}">{{$ciclo->Ciclo}}</option>
                                     @endforeach
                
            </select>
          </div> 
          <div class="col-sm-4">
            <button type="submit" id="btngetSt" class="btn btn-d">  
                   <i class="fa fa-btn fa-search"></i>Mostrar Alumnos</button>
          </div>
          <div class="col-sm-2">
          
          
            
          </div>


        </div>
        </div>

        
       
        {!!Form::close() !!}
        <br>
        <!-- FIN BOTONES PARA SELECCIONAR CARRERA, GRADO, SECCION Y MATERIA -->
        <p>Grado {{$ngrade}} --> Seccion {{$nsec}} --> Carrera:   {{$ncarr}} -->Materia: {{ $mate}}</p>
 <div class="row">
          <div class="col-sm-12">
         

            <img src="img/loader.gif" id="img-load" width="25" height="25" style="display: none">
          <div>
          </div>

            <table id="studentsc" name="studentsc" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">


                     <thead>
                      <tr role="row">
                        <th id="column1" class="hiden" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nombre: activate to sort column descending" style="width: 295px;">Codigo
                        </th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nombre: activate to sort column descending" style="width: 40%;">ALUMNO
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 361px;">BIMESTRE I</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 321px;">BIMESTRE II</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">BIMESTRE III</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">BIMESTRE IV</th>
                        <th>
                          ACCIONES
                        </th>
                      <!--  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 190px;">ACCION </th>  -->
                      </tr>
                  </thead>

                    <tbody>
                                    
                    
                  @foreach($students as $st)    
                  <tr role="row" class="odd">
                    
                      <td class="hiden">{{$st->CodAsignacion}}
                      </td>
                      <td class="sorting_1">{{$st->Apellidos. ', ' . $st->Nombre}}</td>
                      <td class="edit" contenteditable="false">
                        <input maxlength="3"  class="txt-nota input-edit"  id="sc1" name="1" value="{{$st->Nota1}}">
                      </td>
                      <td class="edit" contenteditable="false"><input class="txt-nota input-edit" type="text" id="sc2" name="2" value="{{$st->Nota2}}"></td>
                      <td class="edit" contenteditable="false"><input class="txt-nota input-edit" type="text" id="sc3" name="3" value="{{$st->Nota3}}"></td>
                      <td class="edit" contenteditable="false"><input class="txt-nota input-edit" type="text" id="sc4" name="4" value="{{$st->Nota4}}"></td> 
                      <td> 
                      <button type="submit" id="btngetSt" class="btn btn-xs">  
                   <a href="printc?asig={{$st->CodAsignacion}}"><i class="glyphicon glyphicon-print"></i> Imprimir Tarjeta</button>
                      </a></td>
                    <!--  <td>
                          <button onclick="setScores({{$st->CodAlumno}},{{$st->Nota1}},{{$st->Nota2}},{{$st->Nota3}},{{$st->Nota4}},{{$st->Nombre .' ' . $st->Apellidos}})" id="getmodalsetscores" name="getmodalsetscores" class="btn btn-xs btn-info getmodaledit" data-toggle="modal"
                          value="1">Editar Notas
                          </button>
                      </td>  -->
                         
                  </tr>
                 @endforeach 
                      
                    </tbody>
            <!--   <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot>  -->
              </table>
              </div>
  </div>

              
        
</div>
   
   <!--  MODAL PARA MOSTRAR MENSAJE -->
<div id="modal-msg" class="modal fade modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Mensaje!</h4>
      </div>
      <div class="modal-body">
     <label id="lbl-msg"></label>
  </div>

    
    
    </div>
  </div>
</div>

@stop
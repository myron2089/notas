
@section('title','Crear')

@section('form-st')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            @if($type=='c')
                <div class="box-header with-border"><h3 class="box-title">
                    
                    Crear Estudiante
                    
                     </h3>
                </div>
            @endif
                <div class="box-body">
                    <form class="form-horizontal" id="form-create" >
                        {!! csrf_field() !!}

                        
                        <div class="col-md-6">
                             <br>
                                <label class="control-label">Carrera</label>
                                @if($type=='c')
                                <select  class="form-control dd-modded" id="carr" name="carr" value="{{ old('carr') }}">
                                    <option value="0">Seleccionar</option>
                                     @foreach($carreras as $carrs)
                                        <option value="{{$carrs->CodCarrera}}">{{$carrs->Carrera}}</option>

                                     @endforeach
                                </select>
                                @endif
                                @if($type=='e')
                                  <input type="text"  class="form-control" id="carr" name="carr" disabled>
                                @endif
                                 @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            
                            </div>

                            <div class="col-md-3">
                             <br>
                                <label class="control-label">Grado</label>
                                @if($type=='c')
                                <select  class="form-control" id="grade" name="grade" value="{{ old('grado') }}">
                                    <option value="0">Seleccionar Grado</option>
                                     
                                </select>



                                @endif
                                @if($type=='e')
                                  <input type="text"  class="form-control" id="grade" name="grade" disabled>
                                @endif
                                 @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            
                            </div>

                           <div class="col-md-3">
                             <br>
                                <label for="section" class="control-label">Sección</label>

                                <select  class="form-control" id="section" name="section" value="{{ old('type') }}">
                                    <option value="0">Seleccionar</option>
                                     @foreach($sections as $sect)
                                        <option value="{{$sect->CodSeccion}}">{{$sect->Seccion}}</option>

                                     @endforeach
                                </select>
                                 @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            
                            </div>


                                <p>
                        
                        
                        
                            <div class="col-md-6">
                             <br>
                            <label for="fname" class="control-label">Nombres</label>

                            
                                <input type="text"  class="form-control" id="fname" name="fname" value="{{ old('name') }}">

                                
                                    <div id="msg-fname" name="msg-fname" class="errors">
                                        <strong>El nombre es obligatorio</strong>
                                    </div>
                                
                            </div>
                       
                             <div class="col-md-6">
                              <br>
                            <label for="lname" class="control-label">Apellidos</label>

                           
                                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('name') }}">
                                    <span id="msg-lname" class="errors">
                                        <strong>El apellido es obligatorio</strong>
                                    </span>
                            </div>
                       
                            <div class="col-md-3">
                             <br>
                            <label for="sex" class="control-label">Género</label>
                             <br>
<div class="btn-group" data-toggle="buttons">
                             <label id="lblm" class="btn btn-default">
                    <input type="radio" name="sex" id="sexm" value="M" class="form-control" /> Masculino
                </label>
                <label id="lblf" class="btn btn-default">
                    <input type="radio" name="sex" id="sexf" value="F" /> Femenino
                </label>
               
                </div>                                 <div id="msg-sex" name="msg-sex" class="errors">
                                        <strong>Selecciona un género</strong>
                                </div>
                            
                            </div>
                      
                       <div class="col-md-3">
                        <br>
                            <label for="born" class="control-label">Fecha de Nacimiento</label>

                           
                               <?php
                          echo Form::date('born', \Carbon\Carbon::now(), array('name'=>'born','id'=>'born','class' => 'form-control', 'pattern' => '(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"',
                              'max' =>'2200-12-01'));
                        ?>

                                <div id="msg-born" name="msg-born" class="errors">
                                        <strong>Ingrese un formato correcto de fecha</strong>
                                </div>
                            </div>
                         <div class="col-md-6">
                          <br>
                            <label for="personalc" class="control-label">Código Personal</label>

                        
                                <input type="text" class="form-control" id="personalc" name="personalc" value="{{ old('name') }}">

                                <div id="msg-perc" name="msg-perc" class="errors">
                                        <strong>El código personal es obligatorio</strong>
                                </div>
                            </div>
                        
                         <div class="col-md-6">
                          <br>
                            <label for="address" class="control-label">Dirección</label>

                           
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('name') }}">

                                <div id="msg-address" name="msg-address" class="errors">
                                        <strong>La dirección es obligatoria</strong>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                            <br>
                                <label for="phone" class="control-label">Telefono</label>

                          
                                <input type="tel" maxlength="8" class="form-control" id="phone" name="phone"  value="{{ old('phone') }}" pattern="^(?:\(\d{3}\)|\d{3})[- . ]?\d{3}[- . ]?\d{4}$">

                                <div id="msg-phone" name="msg-phone" class="errors">
                                        <strong>El teléfono es obligatorio</strong>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                             <br>
                                <label class="control-label">Encargado</label>

                                <select  class="form-control" id="encargado" name="encargado" value="{{ old('type') }}">
                                    <option value="0">Seleccionar</option>
                                     @foreach($encargados as $enc)
                                        <option value="{{$enc->CodEncargado}}">{{$enc->Nombre}}</option>

                                     @endforeach
                                </select>
                                <div id="msg-enc" name="msg-enc" class="errors">
                                        <strong>Seleccione un encargado</strong>
                                </div>
                            
                            </div>
                        
                        


                            <div class="col-md-12">
                             <br>
                                <button  id="saverecord" class="btn btn-primary saverecord">
                                    <i class="fa fa-btn fa-user"></i> Guardar
                                </button>
                                <!-- VARIABLE QUE INDICA SI SE CREA O EDITA-->
                                <input type="hidden" id="action" name="action" value="{{$type}}">
                                <!-- Si la accion es editar que obtenga el id y lo almacene en un input para enviarlo a ajax -->
                                @if($type=='e')
                                <input type="hidden" name="ids" id="ids">
                                @endif
                            </div>

                            <div class="col-md-12">
                                
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                
                            </div>
                        </div>

                        <!--  MODAL PARA MOSTRAR MENSAJE -->
<div id="modal-msg-st" class="modal fade modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Mensaje!</h4>
        </div>
    <div class="modal-body">
    <label id="lbl-msg"></label>
  </div>
</div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@stop
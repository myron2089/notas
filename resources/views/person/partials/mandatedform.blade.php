
@section('title','Crear')

@section('forme')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            @if($type=='c')
                <div class="box-header with-border"><h3 class="box-title">
                    
                    Crear Encargado
                    
                     </h3>
                </div>
            @endif
                <div class="box-body">
                    <form class="form-horizontal" id="form-create" >
                        {!! csrf_field() !!}                                
                        <p>
                        
                        
                        
                            <div class="col-md-12">
                             <br>
                            <label for="fname" class="control-label">Nombres</label>

                            
                                <input type="text"  class="form-control" id="fname" name="fname" value="{{ old('name') }}">

                                
                                    <div id="msg-fname" name="msg-fname" class="errors">
                                        <strong>El nombre es obligatorio</strong>
                                    </div>
                                
                            </div>
                       
                       
                             <div class="col-md-6">
                          <br>
                            <label for="address" class="control-label">DPI</label>

                           
                                <input type="text" class="form-control" id="dpi" name="dpi" value="{{ old('name') }}">

                                <div id="msg-address" name="msg-address" class="errors">
                                        <strong>El dpi es obligatorio</strong>
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
 
                            <div class="col-md-12">
                             <br>
                                <button  id="saverecordm" class="btn btn-primary saverecord">
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
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
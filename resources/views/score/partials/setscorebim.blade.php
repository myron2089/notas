
@section('title','Crear')

@section('form-set-scores')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
            @if($type=='c')
                <div class="box-header with-border"><h3 class="box-title">
                    
                    <label id="sname"></label>
                    
                     </h3>
                </div>
            @endif
                <div class="box-body">
                    <form class="form-horizontal" id="form-create" >
                        {!! csrf_field() !!}

                        
                         <div class="col-md-12">
                          <br>
                            <label for="personalc" class="control-label">BIMESTRE I</label>

                        
                                <input type="text" class="form-control" id="bim1" name="bim1" value="{{ old('name') }}">

                                <div id="msg-perc" name="msg-perc" class="errors">
                                        <strong>El código personal es obligatorio</strong>
                                </div>
                            </div>

                            <div class="col-md-12">
                          <br>
                            <label for="personalc" class="control-label">BIMESTRE II</label>

                        
                                <input type="text" class="form-control" id="bim2" name="bim2" value="{{ old('name') }}">

                                <div id="msg-perc" name="msg-perc" class="errors">
                                        <strong>El código personal es obligatorio</strong>
                                </div>
                            </div>

                            <div class="col-md-12">
                          <br>
                            <label for="personalc" class="control-label">BIMESTRE III</label>

                        
                                <input type="text" class="form-control" id="bim3" name="bim3" value="{{ old('name') }}">

                                <div id="msg-perc" name="msg-perc" class="errors">
                                        <strong>El código personal es obligatorio</strong>
                                </div>
                            </div>

                            <div class="col-md-12">
                          <br>
                            <label for="personalc" class="control-label">BIMESTRE IV</label>

                        
                                <input type="text" class="form-control" id="bim4" name="bim4" value="{{ old('name') }}">

                                <div id="msg-perc" name="msg-perc" class="errors">
                                        <strong>El código personal es obligatorio</strong>
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

                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
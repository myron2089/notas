<head>
	
 {!! Html::style('/css/score-style.css') !!}

</head>

<body>
<div class="container">
  	<table>
  		<tr>
	  		<td>
	  			<img src="img/logo.png" height="90">

	  		</td>
	  		<td>
	  			<h1 class="title">CENTRO EDUCATIVO</h1>
  			<h1 class="sub-title">NOMBRE DEL CENTRO EDUCATIVO</h1>

	  		</td>
  		</tr>

  	</table>


  		
  		
  	
    <div class="row1">

    	<div class="col-sm-12">

    	<!-- Imprimiendo {{app('request')->input('asig')}}   -->

    	@foreach($asina as $not)
    	<center><h3 class="sub-title">{{strtoupper($not->Carrera)}}</h3></center>
    	<h4 class="sub-title">{{$not->Grado}}o. SECCION "{{$not->Seccion}}"</h4>
    	 {{strtoupper($not->Nombre)}} {{strtoupper($not->Apellidos)}}
    		
    		<table class="table-score">
    			<thead>
    				<tr>
    					<th>MATERIA</th>
		    			<th>BIM 1</th>
		    			<th>BIM 2</th>
		    			<th>BIM 3</th>
		    			<th>BIM 4</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    		 @foreach($not->notas as $notas)
    			 	
    			 
	    			<tr>
	    				<td>
	    				
	    					{{$notas->Materia}}
	    				</td>
	    				<td>
	    				@if($notas->Nota1!=0)
	    					{{$notas->Nota1}}
	    				@else
	    					- -
	    				@endif</td>
	    				<td>
	    				@if($notas->Nota2!=0)
	    					{{$notas->Nota2}}
	    				@else
	    					- -
	    				@endif
	    				</td>
	    				<td>
	    				@if($notas->Nota3!=0)
	    					{{$notas->Nota3}}
	    				@else
	    					- -
	    				@endif
	    				</td>
	    				<td>
	    				@if($notas->Nota4!=0)
	    					{{$notas->Nota4}}
	    				@else
	    					- -
	    				@endif
	    				</td>
	    			</tr>
	    		 @endforeach
	    		</tbody>
    			
    	    </table>
    	@endforeach
    	</div>  <!-- END COL-SM-12 -- >


    </div> <!--  END ROW -->

</div>  <!-- END CONTAINER -->

</body>
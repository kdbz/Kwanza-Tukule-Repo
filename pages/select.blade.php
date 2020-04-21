@extends('main')
@section('title'," |  $meal ")
@section('content')
<?php $selectx=$checkx=0; ?>
<br>
        <h1>{{ $meal }}</h1>
        <br>
        <div class="row"> 
        	
                   	<div class="col-md-2">
                    	<b>#</b>
                    </div> 	
                    <div class="col-md-4">
                    	<b>Description</b>
                    </div> 
                    <div class="col-md-2">
                        <b>Unit Price/(Kg/Lit)</b>		
                    </div>	
                    <div class="col-md-2">
                        <b>Amount(Kg/Lit)</b>		
                    </div>
                    <div class="col-md-2"> 	
                    	<b>Price</b>
                    </div>	
                   </div>
                   <br>
       <form method="POST" action="{{route('orders.store')}}" id="calculations">{{ csrf_field() }}
        @foreach($ingredients->OrderDetails as $detail )
                   <div class="row">
                   	<div class="col-md-2">
                    	{{ $detail->type_id }}
                    </div>  
                    <div class="col-md-4">
                    	<div class="input-group">
					<input type="checkbox" name="selected" id="check<?php echo $checkx; ?>" value="{{ $detail->selling_price }}" />&ensp;{{ $detail->order_name }}
					 </div>  	
                    </div> 	
                    <div id="unitprice<?php echo $checkx; ?>" class="col-md-2"> 	
                    	 {{ $detail->selling_price }}
                    </div> 
                    <div class="col-md-2"> 	
                    	<div class="input-group">
					<select  id="select<?php echo $selectx; ?>" name="quantity" disabled>
						     <option value="0"> Quantity...</option> 	
          					         <option value="1">1</option> 
          					         <option value="2">2</option> 
          					         <option value="3">3</option> 
          					         <option value="4">4</option> 
                             <option value="5">5</option> 
                             <option value="6">6</option> 
                             <option value="7">7</option> 
                             <option value="8">8</option> 
                             <option value="9">9</option> 
                             <option value="10">10</option> 
					     </select>
					 </div>

                               </div>
                    <div class="col-md-2" id="price"> 	
                    	<input id="price<?php echo $checkx;?>" name="value" class="value" class="unit" name="price"value="" readonly></input>
                    </div>
                  <?php $checkx=$checkx + 1; ?>
                  <?php $selectx=$selectx + 1; ?>
                    </div>	
                    <script type="text/javascript">
    $(document).ready(function(){
      
     
    $('#check0').change(function(){
      if(this.checked){
        document.getElementById('select0').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select0').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check1').change(function(){
      if(this.checked){
        document.getElementById('select1').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select1').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check2').change(function(){
      if(this.checked){
        document.getElementById('select2').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select2').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check3').change(function(){
      if(this.checked){
        document.getElementById('select3').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select3').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check4').change(function(){
      if(this.checked){
        document.getElementById('select4').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select4').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check5').change(function(){
      if(this.checked){
        document.getElementById('select5').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select5').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check6').change(function(){
      if(this.checked){
        document.getElementById('select6').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select6').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check7').change(function(){
      if(this.checked){
        document.getElementById('select7').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select7').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check8').change(function(){
      if(this.checked){
        document.getElementById('select8').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select8').disabled=true;
      }
    });
  });
  $(document).ready(function(){
    $('#check9').change(function(){
      if(this.checked){
        document.getElementById('select9').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select9').disabled=true;
      }
    });
  });
   $(document).ready(function(){
    $('#check10').change(function(){
      if(this.checked){
        document.getElementById('select10').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select10').disabled=true;
      }
    });
  });
    $(document).ready(function(){
    $('#check11').change(function(){
      if(this.checked){
        document.getElementById('select11').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select11').disabled=true;
      }
    });
  });
     $(document).ready(function(){
    $('#check12').change(function(){
      if(this.checked){
        document.getElementById('select12').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select12').disabled=true;
      }
    });
  });
      $(document).ready(function(){
    $('#check13').change(function(){
      if(this.checked){
        document.getElementById('select13').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select13').disabled=true;
      }
    });
  });
       $(document).ready(function(){
    $('#check14').change(function(){
      if(this.checked){
        document.getElementById('select14').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select14').disabled=true;
      }
    });
  });
        $(document).ready(function(){
    $('#check15').change(function(){
      if(this.checked){
        document.getElementById('select15').disabled=!this.checked;
      }
      else
      {
         document.getElementById('select15').disabled=true;
      }
    });
  });
 </script>
        @endforeach
        <br><br>
        <h3>Recipe</h3><br>
        @foreach($recipes->recipes as $recipe )
        <div class="row">
        <div class="col-md-5"> 
        	<br>
                    	<h5>Ingredients</h5>
                    	<br>
                          {!! $recipe->ingredients !!}
                    	 </div>
          <div class="col-md-1">          	 
          <div class="vertical-line" style="height: 45px;"></div> 
          </div>         	 
          <div class="col-md-5"> 
          <br>         	 
                    	<h5>Method</h5>
                    	<br>
                         {!! $recipe->method !!}
                   </div>
                   </div>
        @endforeach           
        <br><br><br>
        <script type="text/javascript">
           $(document).ready(function(){
            total.value=0;
          $('#select0').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice0").innerHTML);
          price0.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select1').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice1").innerHTML);
          price1.value =  (unitp * this.value );
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
         
      });
      $('#select2').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice2").innerHTML);
          price2.value =  (unitp * this.value );
         total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select3').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice3").innerHTML);
          price3.value =  (unitp * this.value);
           total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select4').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice4").innerHTML);
          price4.value =  (unitp * this.value);
           total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select5').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice5").innerHTML);
          price5.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select6').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice6").innerHTML);
          price6.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select7').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice7").innerHTML);
          price7.value =  (unitp * this.value);
           total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select8').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice8").innerHTML);
          price8.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
      });
      $('#select9').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice9").innerHTML);
          price9.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
       });
      $('#select10').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice10").innerHTML);
          price10.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
       });
      $('#select11').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice11").innerHTML);
          price11.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
       });
      $('#select12').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice12").innerHTML);
          price12.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
       });
      $('#select13').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice13").innerHTML);
          price13.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
       });
      $('#select14').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice14").innerHTML);
          price14.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
       });
      $('#select15').on('change', function() {
          var unitp = parseInt(document.getElementById("unitprice15").innerHTML);
          price15.value =  (unitp * this.value);
          total.value = parseInt(total.value) + parseInt(unitp * this.value);
       });
      });
        </script>
                  	TOTALS:&ensp;<input type="text" name="totals" id="total" readonly></input>          	
                  	<br><br><br>
 <input type="submit" class="btn btn-success btn-lg" value="Order"><br><br><br>
 </form>
@endsection  
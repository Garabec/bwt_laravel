@extends('admin')



@section('content')

<!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                  <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

<div id="id-highchartsnya" style="width:100%; height:400px;"></div>
@stop

@section('js')
{!! Chart::display("id-highchartsnya", $charts) !!}
<script type="text/javascript">


			$(document).ready(function(){
			    
			    
			    $(document).on('change', '#reservation', function() {
			      
                $("#id-highchartsnya").empty();
                
                var date=$('#reservation').val();
                
                console.log(date)
                
                $.ajax({
                       url: '/admin/products/grafic',
                       method: 'POST',
                       data: {date: date,_token: $('#signup-token').val()},
                       dataType: 'json',
                       cache: false,
                       success: function(data){
                         
                         console.log(data)
                         
                         	$("#id-highchartsnya").highcharts(data['charts'] );
				
				var chart = $("#id-highchartsnya").highcharts(),
		        
		        svg = chart.getSVG();
				
				format = "chart";

				if(format == "svg")
				{
				    $("#id-highchartsnya").text(svg);
		        }else if(format == "base64"){
		        	base = "data:image/svg+xml;base64," + btoa(svg);
		       		$("#id-highchartsnya").text(base);
		        }
		        
                         
                         
                         
                         
                         
                         
                       },
                        error: function (xhr, ajaxOptions, thrownError) {
                               console.log(xhr.responseText);
                                console.log(xhr.status);
                               console.log(thrownError);
                         }
                       
                 });
                
                

			
		        
			    }); 

			});

			

</script>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script type="text/javascript" >
  $('#reservation').daterangepicker(
{
    locale: {
      format: 'YYYY-MM-DD'
    },
    startDate: '2018-02-13',
    endDate: '2018-02-23'
}, 
function(start, end, label) {
    alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
});
</script>
@stop
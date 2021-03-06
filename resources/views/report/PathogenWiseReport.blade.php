@extends('layouts.amrlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <!--
          <table class="table" width="100%">
            <tr>
              <th scope="col" width="77.8%"></th> 
              <th scope="col"> </th> 
              <th scope="col"> <a class="btn btn-primary" href="{{ url('/') }}/pathogen/pdf">Export PDF</a></th> 
            </tr>
          </table> -->

          @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
          @endif    
        

 <br>
 @php //dump($ultimate_array); @endphp
 @if($total_isolates>0)
  <table id= "tableview" align="center">
            <thead>
				<tr>
					<td width="120" style="text-align: right;" colspan="{{sizeOf($spec_cat_wise_counts)+1}}"><h3>Pathogen: {{$selected_pathogen_name}}</h3> Reports between {{$start_date}} and {{$end_date}} has been used to generate this antibiogram</td>
				</tr>
				<tr>
					<td scope="col" style="text-align: center;">Isolates</td>
					<td width="120" style="text-align: center;" colspan="{{sizeOf($spec_cat_wise_counts)}}">Proportions</td>
				</tr>
				<tr>
					<td scope="col" style="text-align: center; "><b>{{number_format($total_isolates)}}</b></td>
					@foreach($spec_cat_wise_counts as $specimen_category_id=>$count)
						<td scope="col" style="text-align: center; wrap-cell:no-wrap;">
							<b>{{number_format(($count/$total_isolates)*100,0)}}% <small><em>({{$count}})</em></small></b><br />
							{{$SpecimenCategories[$specimen_category_id]}}
						</td>
					@endforeach
					
				</tr>
				
            </thead>
            <tbody>
			  @foreach($ultimate_array as $antibiotic_id=>$specimen_category_sub)
			  <tr>
				<td ><b>{{$antibiotics[$antibiotic_id]}}</b></td>
				@foreach($spec_cat_wise_counts as $specimen_category_id=>$count)
					@if(isset($specimen_category_sub[$specimen_category_id]))
						@php
							$values = $specimen_category_sub[$specimen_category_id];
							/* $spec_cat_total = $values["s"] + $values["i"] + $values["r"]; */
							$colorCond = ceil(number_format($values["s"]/$values["t"]*100,2));
						@endphp
						<td 
							@if($colorCond>=90)
							  style="background-color:#96eb34;color:black; text-align: center";
							@elseif($colorCond>=75 && $colorCond<=89)
							  style="background-color:#ebfe00;color:black;text-align: center";
							@elseif($colorCond>=50 && $colorCond<=74)
							  style="background-color:#ffae00;color:black;text-align: center";
							@elseif($colorCond>=0 && $colorCond<=49)
							  style="background-color:#ff0000;color:black;text-align: center";
							@elseif($colorCond==0)
							  style="background-color:#ff0000;color:black;text-align: center";
							@endif
						>
						{{$colorCond}}% <small><em>({{$values["t"]}})</em></small></td>
					@else
						<td style="text-align:center;">-</td>
					@endif
				@endforeach
				
				</tr>
			  @endforeach
               
			   {{-- @foreach($ultimate_array[$specimen_category_id] as $antibiotic_id=>$count_sub) --}}
						
					
					{{-- @endforeach --}}
            </tbody> 
         </table>
    @else
	
            <h3 style="color: white; background-color: red; padding: 12px; text-align: center;">No Data Found</h3>
    @endif     
        </div>
    </div>
</div>
@endsection

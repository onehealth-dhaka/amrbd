@extends('layouts.amrlayout')

@section('content')
<div class="content-heading">
   <div><small data-localize="dashboard.WELCOME"></small></div><!-- START Language list-->
   </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
          @endif

          <h3 style="text-align: center; color:#5b92e5">Individual Isolate Sample Data [ZDIS]</h3>
          <hr style="border: 5px solid green">

          <table class="table" width="100%">
              <tr>
               <td scope="col" width="77.8%"><a class="btn btn-primary" href="{{ url('/') }}/singleisolatezdissample/create"><h4>Insert Individual Isolate Sample Data (ZDIS)</h4></a></td> 
               <td scope="col"> <a class="btn btn-primary" href="{{ url('/') }}//singleisolatezdissample/excel">Export Excel</a></td> 
               <td scope="col"> <a class="btn btn-primary" href="{{ url('/') }}//singleisolatezdissample/pdf">Export PDF</a></td> 
              </tr>
          </table>

          <table id="tableview">
            <thead>
              <tr>
                <th scope="col">SL #</th>
                <th scope="col">Testing Date</th>
                <th scope="col">Institution Name</th>
                <th scope="col">Species Name</th>
                <th scope="col">Breed Name</th>
                <th scope="col">Location on the body(Specimen)</th>
                <th scope="col">Sampling Location</th>
                <th scope="col">Test Method Name</th>
                <th scope="col">Pathogen Name</th>
                <th scope="col">Created By</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
             <tbody>
              <?php $count = 1; ?>
              @foreach($sglizdissample as $data=>$val)
              <tr>
                <th scope="row">{{ $count }}</th>
                <td>{{ $val->test_date }}</td>
                <td>{{ $val->institutions->institution_name }}</td>
                <td>{{ $val->species->species_name }}</td>
                <td>{{ $val->breed->breed_name }}</td>
                <td>{{ $val->Specimen->specimen_name}}</td>
                <td>{{ $val->specimencollectionlocation->specimen_location_name }}</td>  
                <td>{{ $val->testmethod->test_method_name }}</td>                          
                <td>{{ $val->pathogen->pathogen_name }}</td>
                
                <td>{{ $val->created_by }}</td>
                <td>
                  <a class="btn btn-danger btn-sm" href="{{ url('/singleisolatezdissample/delete-sglizdissample-id/'.$val->sample_id)}}">DELETE</a>

                </td> 
              </tr>
              <?php $count++; ?>
              @endforeach
            </tbody> 
          </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tableview').DataTable();
  });
  
  $(document).ready(function(){
    $('.alert').fadeOut(3000);
  });

</script>

@endsection

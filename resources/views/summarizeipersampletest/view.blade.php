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

          <h3 style="text-align: center; color:#5b92e5">Summarize Isolate Test Data (%)</h3>
          <hr style="border: 5px solid green">
          
          <table class="table" width="100%">
            <tr>
              <th scope="col" width="73%"><a class="btn btn-primary" href="{{ url('/') }}/summarizeipersample/create"><h4>Insert Another set of Summarize Isolate Sample Data (%)</h4></a></th> 

              <th scope="col"><a class="btn btn-primary" href="{{ url('/') }}/summarizeipersampletest/pdf"><h4>Export Pdf</h4></a></th> 

              <th scope="col"><a class="btn btn-primary" href="{{ url('/') }}/summarizeipersampletest/export"><h4>Export Excel</h4></a></h4></a></th> 
            </tr>
          </table>
       

          <table id="tableview" width="100%">
            <thead>
              <tr>
                <th scope="col">SL#</th>
                <th scope="col">Cluster Sample ID</th>
                <th scope="col">Pathogen Name</th>
                <th scope="col">Antibiotic Name</th>
                <th scope="col">Test Result (%)</th>
                <th scope="col">Created By</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @foreach($summarizeipersampletest as $data=>$val)
              <tr>
                <th scope="row">{{ $count }}</th>
               
                <td style="text-align: center">{{ $val->sample_id }}</td>
                <td>{{ $val->pathogen->pathogen_name }}</td>
                <td>{{ $val->antibiotic->antibiotic_name }}</td>
                <td style="text-align: center">{{ $val->test_result_percent }}</td>
                <td style="text-align: center">{{ $val->created_by }}</td>
                <td>
                  <a class="btn btn-danger btn-sm" href="{{ url('/summarizeiperampletest/delete-sglisampletest-id/'.$val->test_id)}}">DELETE</a>
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

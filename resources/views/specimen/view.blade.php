@extends('layouts.amrlayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
          @endif

           <h3 style="text-align: center; color:#5b92e5">List of Specimens</h3>
          <hr style="border: 5px solid green"> 
      
          <br>  
          
          <table class="table" width="100%">
              <tr>
               <th scope="col" width="77.8%"><a class="btn btn-primary" href="{{ url('/') }}/specimen/create">Add New Specimen Name</a></th> 
               <th scope="col"> <a class="btn btn-primary" href="{{ url('/') }}/specimen/excel">Export Excel</a></th> 
               <th scope="col"> <a class="btn btn-primary" href="{{ url('/') }}/specimen/pdf">Export PDF</a></th> 
              </tr>
          </table>
       

  <table class="table" id="tableview">
            <thead>
              <tr>
                <th scope="col">SL #</th>
                <th scope="col">Specimen Name</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @foreach($specimens as $data)
              <tr>
                <th scope="row">{{ $count }}</th>
                <td>{{ $data->specimen_name }}</td>
                <td style="text-align: center">{{ $data->SpecimenCategories->specimen_category_name }}</td>
                <td style="text-align: center">
                  <a class="btn btn-success btn-sm" href="{{ url('/specimen/edit-specimen-name/'.$data->specimen_id)}}">EDIT</a>
       
                  <a class="btn btn-danger btn-sm" href="{{ url('/specimen/delete-specimen-name/'.$data->specimen_id)}}">DELETE</a>

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

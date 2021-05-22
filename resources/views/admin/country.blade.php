@extends('admin/layout/layout')
@section('content')

    <!-- top navigation -->
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
      
        <!-- /top tiles -->

          <div class="">
            <div class="page-title">
              <div class="title_left">
              
                <h3>Manage countries</h3>
              

                </div>
              </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:20px">
    <div class="x_panel">
      <div class="x_title">
 
        <h2>Manage countries</small></h2>
        
        <ul class="nav navbar-right panel_toolbox">
        <a href="javascript:void(0)" onclick="updateProject()" class="btn btn-primary"> <i class="glyphicon glyphicon-plus"></i> Add Country<a>
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        
        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              
                 <!-- <th><input type="checkbox"  onclick="updateProject()" class="flat"></th> -->
              
              
              <th>Status</th>
              <th>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
              <th>Action</th>

            </tr>
          </thead>


          <tbody>
            @foreach($show as $shows)
            <tr id="sid{{$shows->id}}">
              
                 <!-- <th><input type="checkbox" id="check-all" class="flat"></th> -->
        
              <td >@if($shows->status==1)
        <center>      <img src="{{asset('images/cross.png')}}" alt="" style="height:20px;"></center>  
              @else
              <center>      <img src="{{asset('images/crossed.png')}}" alt="" style="height:20px;"></center> 
              @endif
              </td>
              <td>{{$shows->country_name}}</td>
              <td>
            <a class="update" data-title="Update" title="" data-toggle="tooltip" href="#" data-original-title="Update"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp&nbsp
             <a class="delete" data-title="Delete" title="" data-toggle="tooltip" href="#" data-original-title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
             &nbsp&nbsp   @if($shows->status==1)
             <a  href="javascript:void(0)" onclick="updatestatusb({{$shows->id}})"class="update btn-sm" data-title="Block" title="" data-toggle="tooltip"  data-original-title="Block"> Block</a>  
             
             @else
             <a href="javascript:void(0)" onclick="updatestatusa({{$shows->id}})" class="update btn-sm" data-title="Active" title="" data-toggle="tooltip"  data-original-title=""> Activate</a>  
             @endif
           
              </td>
            </tr>
           
            @endforeach
           
          </tbody>
          
        </table>
        <!-- <div class="col-md-2 col-sm-2 col-xm-2 col-xl-2">
        <label class="control-label" style="margin-top:8px;margin-left:75px">With a tick:</label>
</div>
        <div class="col-md-4 col-sm-4 col-xm-4 col-xl-4" >
          <div class="input-group">
                            <select  class="form-control"> 
                                <option>Activate</option>
                                <option>Deactivate</option>
                                <option>Delete</option>
                            </select>
                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary" style="margin-left:3px">Go!</button>
                                          </span>
                          </div>
          </div>
      </div> -->
    </div>
  </div>
        


        
    </div>
    <!-- /page content -->

    <!-- footer content -->
    
    <!-- /footer content -->



<!-- jQuery -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="countryEditForm">
      <div class="modal-body">

         <div class=" form-group has-feedback">
            
            <label>Country</label>
            
                        <input type="text" class="form-control has-feedback-left" id="country_name" placeholder=" &nbsp First Name" required>
                        <span class="glyphicon glyphicon-globe form-control-feedback left" style="left:6px !important; margin-top:6px !important;" aria-hidden="true"></span>
                      </div>
            

      </div>
       <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
       </div>
      </form>
    </div>
  </div>
</div>



@endSection

@section('add')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    function updateProject(){
    $("#exampleModal").modal('toggle');
    }

    $("#countryEditForm").submit(function(e){
        e.preventDefault();


        let country_name = $("#country_name").val();
         $.ajax({
             url:"{{route('country')}}",
             type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
               
              country_name:country_name
               
                
            },
            success:function(response){
              console.log(response);
              $("#datatable-checkbox tbody").prepend(`<tr id="sid${response.id}"><td><center><img src="{{asset('images/cross.png')}}" alt="" style="height:20px;"></center></td><td>${response.country_name}</td>  <td>
            <a class="update" data-title="Update" title="" data-toggle="tooltip" href="#" data-original-title="Update"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp&nbsp
             <a class="delete" data-title="Delete" title="" data-toggle="tooltip" href="#" data-original-title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
             &nbsp&nbsp   @if($shows->status==1)
             <a  href="javascript:void(0)" onclick="updatestatusb({{$shows->id}})"class="update btn-sm" data-title="Block" title="" data-toggle="tooltip"  data-original-title="Block"> Block</a>  
             
             @else
             <a href="javascript:void(0)" onclick="updatestatusa({{$shows->id}})" class="update btn-sm" data-title="Active" title="" data-toggle="tooltip"  data-original-title=""> Activate</a>  
             @endif
           
              </td></tr>`);

                  $("#exampleModal").modal('toggle');
                  $("#countryEditForm")[0].reset();
                    }
        });
    });



    </script>




@endsection

@section('checked')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
function updatestatusb(id){
alert(id);
    }
</script>
@endsection



@section('block')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
function updatestatusa(id){
alert(id);
    }
</script>
@endsection
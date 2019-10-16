@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        @if(session('message'))
      		 <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
    		@endif
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Users</div>
          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm" id="show_list_users">
              <thead>
                  <tr class="filters">
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>User E-mail</th>
                      <th>City</th>
                      <th>Created At</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
              <?php
              if(Auth::check())
              {
                $user_permission = Auth::user()->user_permission;
                $array_permission = explode(',',$user_permission);
              }
              ?>
              @foreach ($users as $user)
                <tr id="{{{ $user->id }}}">
                      <td>{{{ $user->id }}}</td>
                  <td>{{{ $user->first_name }}}</td>
              <td>{{{ $user->last_name }}}</td>
              <td>{{{ $user->email }}}</td>
              <td>{{{ $user->city }}}</td>
              <td>{{{ $user->created_at }}}</td>
              <td>
                <?php if ( in_array("3", $array_permission)) { ?>
                <button class="btn btn-pill btn-success edit_button" type="button">Edit</button>
                <?php } if ( in_array("4", $array_permission)) { ?>
                <button  data-id="{{ $user->id }}" class="btn btn-danger mb-1 delete_button" type="button" data-toggle="modal" data-target="#myModal">Delete</button>
                <?php } ?>
              </td>
            </tr>
              @endforeach
              <input type="hidden" value="<?php echo csrf_token(); ?>" name="_token">
              </tbody>
            </table>
            {{ $users->links() }}
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
  </div>
</div>
<input type="hidden" id="current_user_id" value="" />
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Record!</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this record!</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" id="delete_record" type="button">Delete It!</button>
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer_scripts')
<script type="text/jscript">
$(document).ready(function(){
    // Delete record
    $('#show_list_users tbody').on( 'click', 'button.delete_button', function () {
        var user_id = $(this).closest('tr').attr('id');
        $("#current_user_id").val(user_id);
    } );
    // Edit record
    $('#show_list_users tbody').on( 'click', 'button.edit_button', function () {
        var edit_id = $(this).closest('tr').attr('id');
        // window.location = "{{ route('edit.user', "+edit_id+") }}";
        window.location = "users/"+edit_id+"/edit";

    } );
    // Delete User
    $("#delete_record").on('click', function (){
        var id = $("#current_user_id").val();
        console.log(id);
        var token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
              url: "users/delete/"+id,
              type: "GET",
              data: {id: id, "_token": token} ,
              success: function (response) {
                  window.location = "users";
              },
              error: function(jqXHR, textStatus, errorThrown) {
                 console.log(textStatus, errorThrown);
              }
          });
    });
});
// $(".deleteRecord").click(function(){
//     var id = $(this).data("id");
//     var token = $("meta[name='csrf-token']").attr("content");
//
//     $.ajax(
//     {
//         url: "users/"+id,
//         type: 'DELETE',
//         data: {
//             "id": id,
//             "_token": token,
//         },
//         success: function (){
//             console.log("it Works");
//         }
//     });
//
// });
</script>
@endsection

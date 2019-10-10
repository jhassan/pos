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
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
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
                <tr id="row_{{{ $user->id }}}">
                      <td>{{{ $user->id }}}</td>
                  <td>{{{ $user->first_name }}}</td>
              <td>{{{ $user->last_name }}}</td>
              <td>{{{ $user->email }}}</td>
              <td>{{{ $user->city }}}</td>
              <td>{{{ $user->created_at }}}</td>
              <td>
                <?php if ( in_array("3", $array_permission)) { ?>
                <a href="{{ route('users.update', $user->id) }}"><img src="{{asset("dist/img/edit.gif")}}" ></a>
                <?php } if ( in_array("4", $array_permission)) { ?>
                <a id="{{ $user->id }}" class="deleteRecord" style="cursor:pointer;"><img src="{{asset("dist/img/delete.png")}}" ></a>
                <?php } ?>
              </td>
            </tr>
              @endforeach
              <input type="hidden" value="<?php echo csrf_token(); ?>" name="_token">
              <div id="dialog-confirm-delete" title="Delete Reocrs" style="display:none;">Do you want to delete this record?</div>
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
@endsection

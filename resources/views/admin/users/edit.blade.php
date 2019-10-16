@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong>Edit User</strong>
            <small>Form</small>
          </div>
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form role="form" action="{{ route('edit.user', $users->id) }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="card-body">
              <div class="row">
                <div class="form-group col-sm-4">
                    <label for="first_name">First Name *</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{ $users->first_name }}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="last_name">Last Name *</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ $users->last_name }}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="login_name">Login Name *</label>
                    <input type="text" class="form-control" id="login_name" placeholder="Login Name" name="login_name" value="{{ $users->login_name }}">
                </div>
                <div class="form-group col-sm-4">
                  <label for="email">Email *</label>
                  <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ $users->email }}">
                </div>
                <div class="form-group col-sm-4">
                  <label for="Password">Password *</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="form-group col-sm-4 hide">
                  <label for="confirm_password">Confirm Password *</label>
                  <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                </div>
                <div class="dropdown col-sm-4">
                    <label for="gender" >Gender</label>
                      <select class="form-control" title="Select Gender..." name="gender">
                          <option value="">Select</option>
                          <option value="1" @if($users->gender === 1) selected="selected" @endif >MALE</option>
                          <option value="2" @if($users->gender === 2) selected="selected" @endif >FEMALE</option>

                      </select>
                </div>
                <div class="dropdown col-sm-4">
                    <label for="gender" >User Type</label>
                      <select class="form-control" title="Select User Type..." name="user_type" id="get_user_type">
                          <option value="">Select User Type</option>
                          <option value="2" @if($users->user_type === 2) selected="selected" @endif >Admin</option>
                          <option value="3" @if($users->user_type === 3) selected="selected" @endif >Sub Admin</option>
                          <option value="1" @if($users->user_type === 1) selected="selected" @endif >Client</option>
                      </select>
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ $users->city }}">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $users->address }}">
                  </div>
                  <div class="dropdown col-sm-4">
                  <label for="shop" >Shop</label>
                  <select class="form-control" title="Select Shop..." name="shop_id">
                    <option value="">Select</option>
                    @foreach ($shops as $shop)
                      <option value="{{ $shop->id}}" {{ ($users->shop_id === $shop->id ? "selected":"") }} >{{ $shop->shop_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="clear"></div>
                <div class="form-group col-md-12 pull-left" style=" margin-top: 20px;">
                    <input type="checkbox" id="checkAll"/> <label style="font-size: 14px;">Check All</label>
                  </div>

                @foreach($parentPermission as $parent)
                <div class="form-group row col-md-12">
                  <label class="col-md-12 col-form-label"><strong>{{ ucfirst($parent->name) }}</strong></label>
                  @foreach($childPermission as $child)
                  @if($child->parent_id == $parent->id)
                  <?php
                  if(!empty($user_permission))
                  {
                    $array_permission = explode(',',$user_permission);
                    if (in_array($child->id, $array_permission))
                      $checked = "checked='checked'";
                    else
                      $checked = "";
                  }
                  else
                      $checked = "";

                  ?>
                  <div class="col-md-3 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input checkedAll" {{ $checked }} name="permission[{{$child->id}}]" type="checkbox" value="{{ $child->id }}" id="{{ $child->id }}">
                      <label class="form-check-label" for="inline-checkbox1">{{ ucfirst($child->name) }}</label>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
                @endforeach
              </div>
              <!--  end row -->

          </div>
          <div class="card-footer">
              <button class="btn btn-sm btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
            </div>
        </form>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
  </div>
</div>
@endsection
@section('footer_scripts')
  <script type="text/javascript">
  $(document).ready(function() {

    // Hide permission div
    $("#get_user_type").change(function (){
      var value = $(this).val();
      if(value == 1)
        $("#permission_block").addClass('hide');
      else
        $("#permission_block").removeClass('hide');
    });

    $("#checkAll").change(function () {
        $("input:checkbox.checkedAll").prop('checked', $(this).prop("checked"));
    });
    $(".cb-element").change(function () {
        _tot = $(".cb-element").length
        _tot_checked = $(".checkedAll:checked").length;

        if(_tot != _tot_checked){
          $("#checkAll").prop('checked',false);
        }
    });
  });
  </script>
@endsection

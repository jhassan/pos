@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong>Add User</strong>
            <small>Form</small>
          </div>
          <form role="form" action="" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="card-body">
              <div class="row">
                <div class="form-group col-sm-4">
                    <label for="first_name">First Name *</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{{ Request::old('first_name') }}}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="last_name">Last Name *</label>
                    <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{{ Request::old('last_name') }}}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="login_name">Login Name *</label>
                    <input type="text" class="form-control" id="login_name" placeholder="Login Name" name="login_name" value="{{{ Request::old('login_name') }}}">
                </div>
                <div class="form-group col-sm-4">
                  <label for="email">Email *</label>
                  <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{{ Request::old('email') }}}">
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
                          <option value="1" @if(Request::old('gender') === 1) selected="selected" @endif >MALE</option>
                          <option value="2" @if(Request::old('gender') === 2) selected="selected" @endif >FEMALE</option>

                      </select>
                </div>
                <div class="dropdown col-sm-4">
                    <label for="gender" >User Type</label>
                      <select class="form-control" title="Select User Type..." name="user_type" id="get_user_type">
                          <option value="">Select User Type</option>
                          <option value="2">Admin</option>
                          <option value="3">Sub Admin</option>
                          <option value="1">Client</option>
                      </select>
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="City" name="city">
                  </div>
                  <div class="form-group col-sm-4">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                  </div>
                  <div class="dropdown col-sm-4">
                  <label for="shop" >Shop</label>
                  <select class="form-control" title="Select Shop..." name="shop_id">
                      <option value="">Select</option>
                      <option value="3">Cafe Cappellos</option>
                      <option value="2">Ghulshan Market New Multan</option>
                      <option value="1">3rd Floor Unitd Mall Multan</option>
                  </select>
                </div>
                <?php print_r($parentPermission); ?>


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

@extends('admin.layouts.app')

{{-- Page content --}}
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> List of Transections</div>
          <div class="card-body" id="tableBody">
            <div class="box-header">
                <div class="form-inline col-md-12">
                    <!-- Search: <input type="text" class="form-control" id="search_value" name="search_value" />
                    <button type="button" class="btn btn-small btn-default search-post">Go</button> -->
                    <div class="box-body col-sm-2">
                      <label for="shop_address">Start Date</label>
                      <input type="text" class="date-pick form-control" id="start_date" placeholder="Start Date" name="start_date" value="{{ Request::old('start_date') }}">
                    </div>
                    <div class="box-body col-sm-2">
                      <label for="shop_address">End Date</label>
                      <input type="text" class="date-pick form-control" id="end_date" placeholder="End Date" name="end_date" value="{{ Request::old('end_date') }}">
                    </div>
                    <div class="box-body col-sm-3">
                      <div class="dropdown">
                      <label for="shop" >Shop</label>
                        <select class="form-control" title="Select Shop..." name="shop_id" id="shop_id">
                            <option value="">Select</option>
                            @foreach ($shops as $shop)
                            <option value="{{{ $shop->id}}}"  >{{{ $shop->shop_name}}}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="box-body col-sm-3 hide">
                      <div class="dropdown">
                      <label for="shop" >Year</label>
                        <select class="form-control" title="Select Year" name="select_year" id="select_year">
                            <option value="2017">2017-2018</option>
                            <option value="2016">2016-2017</option>
                        </select>
                      </div>
                  </div>
                  <div class="box-footer">
                    <button type="button" id="search_data" class="btn btn-primary">Search</button>
                  </div>
                </div>
            </div>
            @include('admin.tables.all_vouchers_table')
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
  </div>
</div>

@endsection

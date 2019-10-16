<?php 
if($start_date != "1970-01-01" && $end_date != "1970-01-01"):
    $get_shop_name = "";
    if(empty($shop_id))
        $shop_id = app('request')->input('shop_id');
    if(!empty($shops)):
        foreach ($shops as $shop) {
            if($shop_id == $shop->shop_id)
            $get_shop_name = $shop->shop_name;
        }
    endif;
    echo "<b>Start Date:</b> ". date("d-m-Y", strtotime($start_date)) ."<b>, End Date: </b>". date("d-m-Y", strtotime($end_date)). "<b>, Shop: </b>". $get_shop_name;
  endif;
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr class="filters">
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Product Name</th>
            <th>Date</th>
            <th>Employee</th>
        </tr>
    </thead>
    <tbody>
    @foreach($detail_sale as $detail)
    <tr>
      <td>{{ $detail->product_price }}</td>
      <td>{{ $detail->product_qty }}</td>
      <td>{{ $detail->product_name }}</td>
      <td>{{ date("d-M-Y",strtotime($detail->created_at)) }}</td>
      <td>{{ $detail->first_name }}</td>
    </tr>
    @endforeach
        
    </tbody>
  </table>
  <table class="table table-striped m-b-0">
  <thead>
    <tr>
      <td style="width:162px; font-weight:bold;">Total Sale : {{ $TotalSale }}</td>
      <td style="font-weight:bold;">Total Quantity : {{ $TotalQty }}</td>
      <td style="font-weight:bold;">Total Discount : {{ $DiscountAmount }}</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </thead>
</table>
{!! str_replace('%2F', '/', $detail_sale->appends(Input::except('page'))->render()) !!}
                            
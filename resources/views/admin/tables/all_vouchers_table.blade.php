<?php
if($start_date != "1970-01-01" && $end_date != "1970-01-01"):
    $get_shop_name = "";
    if(empty($shop_id))
        $shop_id = 1; // app('request')->Request('shop_id')
    if(!empty($shops)):
        foreach ($shops as $shop) {
            if($shop_id == $shop->id)
            $get_shop_name = $shop->shop_name;
        }
    endif;
    echo "<b>Start Date:</b> ". date("d-m-Y", strtotime($start_date)) ."<b>, End Date: </b>". date("d-m-Y", strtotime($end_date)). "<b>, Shop: </b>". $get_shop_name;
  endif;
?>
<table id="example2" class="table table-bordered table-hover">
<thead>
    <tr class="filters">
        <th>Voucher Type</th>
        <th>Voucher Date</th>
        <th>Voucher Amount</th>
        <th>Shop Name</th>
        <th>Voucher Descriptions</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach ($arrayVouchers as $voucher)
	<tr id="row_{{{ $voucher->vm_id }}}">
    <td>{{{ $voucher->vm_type }}}</td>
    <td>{{{ date("d-m-Y", strtotime($voucher->vm_date)) }}}</td>
    <td>{{{ number_format($voucher->vm_amount) }}}</td>
    <td>{{{ $voucher->shop_name }}}</td>
    <td>{{{ $voucher->vm_desc }}}</td>
    <td> <a id="{{ $voucher->vm_id }}" class="ShowVoucherDetails" style="cursor:pointer;">View</a>/<a id="{{ $voucher->vm_id }}" class="deleteRecord" style="cursor:pointer;">Delete</a>
                </td>
	</tr>
@endforeach
    <!-- <input type="hidden" value="<?php echo csrf_token(); ?>" name="_token"> -->
</tbody>
</table>
<!-- {!! $arrayVouchers->render() !!} -->
{!! str_replace('%2F', '/', $arrayVouchers->appends(Request::except('page'))->render()) !!}

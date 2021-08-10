@extends('layouts.front')
@section('content')


<section class="user-dashbord">
    <div class="container">
      <div class="row">
        @include('includes.user-dashboard-sidebar')
        <div class="col-lg-8">
					<div class="user-profile-details">
						<div class="order-history">
							<div class="header-area">
								<h4 class="title" >
									{{ $langg->lang826 }}
								</h4>
							</div>
							<div class="mr-table allproduct mt-4">
									<div class="table-responsiv">
											<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>{{ $langg->lang840 }}</th>
                                                        <th>{{ $langg->lang334 }}</th>
														<th>{{ $langg->lang827 }}</th>
                                                        <th>{{ $langg->lang828 }}</th>
														<th>{{ $langg->lang282 }}</th>
													</tr>
												</thead>
												<tbody>
                            @foreach(Auth::user()->transactions as $data)
                                <tr>
									<td>{{$data->txn_number}}</td>
                                    <td>{{ $data->type == 'plus' ? '+' : '-' }}{{$data->currency_code}}{{ round($data->amount * $data->currency_value, 2) }}</td>
                                    <td>{{date('d-M-Y',strtotime($data->created_at))}}</td>
									<td>{{$data->details}}</td>
									<td>
									<a href="javascript:;" data-href="{{ route('user-trans-show',$data->id)}}" data-toggle="modal" data-target="#trans-modal" class="txn-show mybtn1 sm sm1">
										{{ $langg->lang841 }}
										</a>
									</td>
                                </tr>
                            @endforeach
												</tbody>
											</table>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<!-- Order Tracking modal Start-->
<div class="modal fade" id="trans-modal" tabindex="-1" role="dialog" aria-labelledby="trans-modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body" id="trans">

		</div>
		</div>
	</div>
</div>
<!-- Order Tracking modal End -->

@endsection


@section('scripts')

<script type="text/javascript">
    $('.txn-show').on('click',function(e){
        var url = $(this).data('href');
        $('#trans').load(url);
        $('#trans-modal').modal('show');
    });


</script>

@endsection
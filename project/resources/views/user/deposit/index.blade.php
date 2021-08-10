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
									{{ $langg->lang824 }}
									<a class="mybtn1" href="{{route('user-deposit-create')}}"> <i class="fas fa-plus"></i> {{ $langg->lang821 }}</a>
								</h4>
							</div>
							<div class="mr-table allproduct mt-4">
								<div class="table-responsiv">
									<table id="example" class="table table-hover dt-responsive" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>{{ $langg->lang825 }}</th>
												<th>{{ $langg->lang332 }}</th>
												<th>{{ $langg->lang334 }}</th>
												<th>{{ $langg->lang335 }}</th>
											</tr>
										</thead>
										<tbody>
											@foreach(Auth::user()->deposits as $data)
												<tr>
													<td>{{date('d-M-Y',strtotime($data->created_at))}}</td>
													<td>{{$data->method}}</td>
													<td>{{$data->currency_code}}{{ round($data->amount * $data->currency_value, 2) }}</td>
													<td>{{ $data->status == 1 ? 'Completed' : 'Pending'}}</td>
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
@endsection

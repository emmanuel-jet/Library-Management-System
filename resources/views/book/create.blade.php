@extends('layouts.master') 

@section('extra_sheets')
    
    <link href="{{ asset('css/flickity/flickity.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/flickity/flickity.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/js/selectize.js/dist/css/selectize.bootstrap2.css') }}">

    <!--[if IE 8]>
    <script src="{{ asset('/js/selectize.js/examples/js/es5.js') }}"></script><![endif]-->
    <script src="{{ asset('/js/selectize.js/examples/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/selectize.js/dist/js/standalone/selectize.js') }}"></script>
    <script src="{{ asset('/js/selectize.js/examples/js/index.js') }}"></script>
@endsection

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {!! session()->get('message') !!}
    </div>
@endif
<div class="col-lg-8 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="custom-registration">
            <h4 class="title">Add New Book</h4>            
        </div>
        <div class="card-content">
            <form id="Registration-Form" action="{{ route('book.store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Title*</label>
                            <input name="book_name" id="book_name" type="text" class="form-control" required>
                        </div>
                    </div>
										<div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Author*</label>
                            <input type="text" id="book_author" name="book_author" class="form-control" required>
                        </div>
                    </div>
                </div>
								<div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Select Subject Tracing*</label>
                            <select name="book_category" id="book_category" class="form-control" required>
																		<option selected class="d-none"></option>
																		@foreach($categories as $category) 
																			<option value="{!!$category->id!!}">{!!$category->name!!}</option>
																		@endforeach
																	</select>
                        </div>
                    </div>
                    <div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Call Mark*</label>
													<input name="call_mark" id="call_mark" type="text" class="form-control" required>
											</div>
									</div>
                </div>
                <div class="row">
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Quantity (pcs)*</label>
													<input name="stock_qty" id="stock_qty" type="number" min='0' max='500' class="form-control" required>
											</div>
									</div>
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Collation*</label>
													<input type="text" name="collation" class="form-control" required>
											</div>
									</div>
                </div>
								<div class="row">
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Place Of Publication*</label>
													<input name="pop" type="text" class="form-control" required>
											</div>
									</div>
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Year Of Publication*</label>
													<input type="number" name="yop" min='4' class="form-control" required>
											</div>
									</div>
                </div>
								<div class="row">
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">ISSB/ISSN*</label>
													<input name="isbn" type="text" class="form-control" required>
											</div>
									</div>
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">BarCode Number*</label>
													<input type="text" name="bar_num" class="form-control" required>
											</div>
									</div>
                </div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group label-floating">
												<label class="control-label">Select Location*</label>
												<select name="book_location" id="book_location" class="form-control" required>
																<option selected class="d-none"></option>
																@foreach($locations as $location) 
																	<option value="{!!$location->name!!}">{!!$location->name!!}</option>
																@endforeach
															</select>
										</div>
									</div>
								</div>
								{{--  <div class="row">
									<div class="col-md-12">
                        <div class="form-group label-floating">
													 @php
															$book_locations = array();
															foreach ($book_locations as $value) {
																	array_push($book_locations, $value->location);
															}
													@endphp 
                            <label class="control-label">Select Location(s)*</label>
                            <select name="book_location" id="book_location" required multiple>
															@foreach($locations as $location) 
																<option value="{{ $location->id}}" {{ in_array($location->id, old('location', $book_locations)) ? 'selected' : '' }}>{{ $location->name }}</option>
															@endforeach
														</select>
                        </div>

												<script>
                            $('#book_location').selectize({
                                maxItems: 10,
                                plugins: ['restore_on_backspace', 'remove_button'],
                                delimiter: ','
                            });
                        </script>
                    </div>
								</div>  --}}
                @include('layouts.errors')
                <p class="error text-center alert alert-danger d-none"></p>
								<a href="{{ url('books') }}" class="btn btn-link pull-left" style="text-decoration:none">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Add Book</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra_scripts')

    <script src="{{ asset('js/flickity/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script class="jsbin" src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script class="jsbin" src="{{ asset('js/jquery/jquery-ui.min.js') }}"></script>

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

@endsection


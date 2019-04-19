@extends('layouts.master')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {!! session()->get('message') !!}
    </div>
@endif
<div class="col-lg-8 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="custom-registration">
            <h4 class="title">Update Book</h4>            
        </div>
        <div class="card-content">
            <form action="{{ route('book.update',[$book->id]) }}" method="POST">
								{{ method_field('PUT') }}
                {{ csrf_field() }} 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Title*</label>
                            <input name="book_name" id="book_name" type="text" value="{{ $book->book_name }}" class="form-control" required>
                        </div>
                    </div>
										<div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Author*</label>
                            <input type="text" id="book_author" name="book_author" value="{{ $book->book_author }}"class="form-control" required>
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
																<option value="{!!$category->id!!}" @if($book->book_category == $category->id)
                                                            selected
                                                            @endif>{!!$category->name!!}</option>
															@endforeach
														</select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Call Mark*</label>
                            <input name="call_mark" id="call_mark" type="text" value="{{ $book->call_mark }}"class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Quantity (pcs)*</label>
													<input name="stock_qty" id="stock_qty" type="number" min='0' max='500' value="{{ $book->stock_qty }}" class="form-control" required>
											</div>
									</div>
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Collation*</label>
													<input type="text" name="collation" class="form-control" value="{{ $book->collation }}" required>
											</div>
									</div>
                </div>
								<div class="row">
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Place Of Publication*</label>
													<input name="pop" type="text" class="form-control" value="{{ $book->pop }}" required>
											</div>
									</div>
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">Year Of Publication*</label>
													<input type="number" name="yop" class="form-control" value="{{ $book->yop }}" required>
											</div>
									</div>
                </div>
								<div class="row">
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">ISSB/ISSN*</label>
													<input name="isbn" type="text" class="form-control" value="{{ $book->isbn }}" required>
											</div>
									</div>
									<div class="col-md-6">
											<div class="form-group label-floating">
													<label class="control-label">BarCode Number*</label>
													<input type="text" name="bar_num" class="form-control" value="{{ $book->bar_num }}" required>
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
																<option value="{!!$location->name!!}" @if($book->book_location == $location->name)
                                                            selected
                                                            @endif>{!!$location->name!!}</option>
															@endforeach
														</select>
                        </div>
                    </div>
								</div>
								{{-- <div class="row">
									<div class="col-md-12">
                        <div class="form-group label-floating">
													 @php
															$book_locations = array();
															foreach ($book_locations as $value) {
																	array_push($book_locations, $value->location);
															}
													@endphp 
                            <label class="control-label">Select Location(s)*</label>
                            <select name="book_location[]" id="book_location" required multiple>
															@foreach($locations as $location) 
																<option value="{{ $location->name}}" {{ in_array($location->name, old('location', $book_locations)) ? 'selected' : '' }}>{{ $location->name }}</option>
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
								</div> --}}
                @include('layouts.errors')
                <p class="error text-center alert alert-danger d-none"></p>
								<a href="{{ url('books') }}" class="btn btn-link pull-left" style="text-decoration:none">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Update Book</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection
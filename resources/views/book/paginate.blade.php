                <table class="table table-hover">
                    <thead>
                        <tr>                        	
                            <th><strong>Title</strong></th>
                            <th><strong>Author</strong></th>
                            <th><strong>Subject Tracing</strong></th>
                            <th>
															@if(Route::has('login'))
																@auth
																	<strong>Stock Qty</strong>
																	@else
																	<strong>Call Mark</strong>	
																@endauth
															@endif
														</th>
                            <th class="text-center"><strong>Availibility</strong></th>
                            <th class="text-center">
															@if(Route::has('login'))
																@auth
																	<strong>Actions</strong>
																	@else
																	<strong>Location</strong>	
																@endauth
															@endif
														</th>
                        </tr>

                    </thead>
                    <tbody id="ins">

                        @foreach($books as $book)
                      
                        <tr id="book-{!!$book->id!!}">
                            <td class="text-center d-none"> {!!$book->id!!} </td>
														<td>
															@if(Route::has('login'))
																@auth
																	<strong style="cursor: pointer;"  id="book_info_show" data-id="{{ $book->id }}" data-toggle="modal" data-target="#book_info_modal">{{ $book->book_name }}</strong>
																@else
																	{!!$book->book_name!!}
																@endauth
															@endif 
														</td>
                            <td>{!!$book->book_author!!} </td>
                            <td>{!!$book->name!!} </td>
                            <td>
															@if(Route::has('login'))
																@auth
																	{!! $book->stock_qty - $book->borrow_qty !!} out of {!! $book->stock_qty !!}
																@else
																	{!! $book->call_mark !!}
																@endauth
															@endif
														</td>
                            @if($book->stock_qty - $book->borrow_qty == 0)
                            <td class="text-center"><button type="button" rel="tooltip" class="label label-warning btn btn-xs" data-original-title="Not Available">Not Available</button></td>
                            @elseif($book->stock_qty - $book->borrow_qty < 0)
                            <td class="text-center"><button type="button" rel="tooltip" class="label label-danger btn btn-xs" data-original-title="Illigal Issues Here">Something is wrong here</button></td>

                            @else
                            <td class="text-center"><button type="button" rel="tooltip" class="label label-success btn btn-xs" data-original-title="Available">Available</button></td>

                            @endif
                            <td class="text-center">                               
                        </button>
												@if(Route::has('login'))
													@auth
														@if($book->stock_qty - $book->borrow_qty > 0)
														<button type="button" rel="tooltip" class="btn btn-warning btn-simple btn-xs" data-toggle="modal" data-target="#IssueModal " data-book_name="{!!$book->book_name!!}" data-id="{!!$book->id!!}" data-book_author="{!!$book->book_author!!}" id="issue" data-original-title="Issue This Book">
																	<i class="fa fa-gavel"></i>
														</button>
														@endif
														<a type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs" data-id="{!! $book->id !!}" data-original-title="Update Information" href="{{ route('book.edit',[$book->id]) }}"><i class="fa fa-edit"></i></a>
														<button type="button" rel="tooltip" class="delete btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#DeleteBook" data-id="{!!$book->id!!}" data-book_name="{!!$book->book_name!!}" data-original-title="Delete This Book"> 
																<i class="fa fa-times"></i>  
														<div class="ripple-container"></div></button>
													@else
														{{ $book->book_location }}
												@endauth
											@endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if  ($links==1)
                    {!!$books->links()!!}
                @endif
@include('book.info')
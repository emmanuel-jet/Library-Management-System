
<div class="modal fade" id="book_info_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center"><strong>Book Information</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                  <div class="col-md-12 text-center"> 
										<p>ID : <strong id="id"></strong> </p>
										<p>Title : <strong id="book_name"></strong> </p>
										<p>Author : <strong id="book_author"></strong> </p>
										<p>Book Location : <a href="{{ url('locations') }}"><strong id="book_location"></strong></a></p>
										<p>Place Of Publication : <strong id="pop"></strong> </p>
										<p>Year Of Publication : <strong id="yop"></strong> </p>
										<p>Collation : <strong id="collation"></strong> </p>
										<p>Subject Tracing : <a href="{{ url('categories') }}"><strong id="book_category"></strong></a></p>
										<p>Call Mark : <strong id="call_mark"></strong> </p>
										<p>Stock Quantity : <strong id="stock_qty"></strong> </p>
										<p>ISBN/ISSN : <strong id="isbn"></strong> </p>
										<p>BarCode Number : <strong id="bar_num"></strong> </p>
                 	</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal">OK</button> 
             </div>
    </div>
  </div>
</div>

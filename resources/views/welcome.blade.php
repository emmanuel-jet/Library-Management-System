@extends('layouts.master') 

@section('search')

@if(session()->has('message'))
    <div class="alert alert-success">
        {!! session()->get('message') !!}
    </div>
@endif
<div class="collapse navbar-collapse">
  <div class="books-search navbar-form navbar-right" role="search">
      {!! csrf_field()!!}
      <div class="form-group  is-empty">
             <input type="text" class="form-control" name="search_input" placeholder="Type & Search...">
            <span class="material-input"></span>
        </div>
        <button class="btn btn-white btn-round btn-just-icon">
						<i class="fa fa-search"></i>
            <div class="ripple-container"></div>
        </button>        
    </div>
</div>
@endsection 

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="custom-book">
                <h4 style="display: inline-block;" class="title">Book List</h4>
            </div>
            <div class="book_ajax_paginatable card-content table-responsive">
                @include('book.paginate')              
            </div>
        </div>
    </div>
</div>

@endsection
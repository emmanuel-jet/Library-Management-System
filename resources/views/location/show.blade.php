@extends('layouts.master') 
@section('content')

<div class="row text-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-header" data-background-color="custom-book">
                <h4 style="display: inline;" class="title">Locations</h4>
                <a style="cursor: pointer;" type="button" rel="tooltip" title="" class="add_book pull-right" data-toggle="modal" data-target="#CreateLocation" data-original-title="Add New Location">   
									<i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="card-content table-responsive">
                <table class="table table-hover">
         <thead>
                            <tr>
                               <th class="text-center"><strong>ID</strong></th>
                                <th><strong>Location Name</strong></th>
                                <th><strong>Actions</strong></th>

                            </tr>
                        </thead>
                    <tbody>
                        @foreach($locations as $location)                      
                        <tr>
                          <td class="text-center">
                            {{$location->id}}
                          </td>
													<td class="text-left"> 
															{{$location->name}} 
													</td>
                            <td class="text-center"> 
        
                  <button type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs" data-toggle="modal" id="UpdateLocation" data-id="{{$location->id}}" data-name="{{$location->name}}" data-target="#updateLoc" data-original-title="Edit">
                  <i class="fa fa-edit"></i>
                  </button> 
             
                 <button type="button" rel="tooltip" title="" class="delete_location btn btn-danger btn-simple btn-xs" data-original-title="Delete" data-id="{{$location->id}}" data-toggle="modal" data-target="#locationDelete">  
                <i class="fa fa-times"></i>  
                   </button>
   

                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@include('location.create')

@include('location.update')
@include('location.delete')


@endsection
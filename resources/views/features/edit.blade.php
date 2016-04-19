@extends('layouts.app')

@section('content')
<div class="container">
     <div class="col-sm-offset-2 col-sm-8">
         <div class="panel panel-default">
             <div class="panel-heading">
                 Edit Feature
             </div>

             <div class="panel-body">
                 <!-- Display Validation Errors -->
                 @include('common.errors')

                 <!-- New Feature Form -->
                 <form action="/product/{{$product->id}}/feature/{{$feature->id}}" method="POST" class="form-horizontal" id = "featureform">
                     {{ csrf_field() }}
                     {{ method_field('PATCH') }}
                     <!-- Feature Name -->
                     <div class="form-group">
                         <label for="name" class="col-sm-3 control-label">Feature</label>

                         <div class="col-sm-6">
                             <input type="text" name="name" id="name" class="form-control" value="{{$feature->name}}">
                         </div>
                     </div>
                     <!-- Feature Body -->
                     <div class="form-group">
                         <label for="feature_body" class="col-sm-3 control-label">Block text</label>

                         <div class="col-sm-6">
                             <textarea name="feature_body" form="featureform" id="feature_body"
                             class="form-control" value="{{ $feature->feature_body }}">{{ $feature->feature_body }}</textarea>
                         </div>
                     </div>
                     <!-- Feature image_frame -->
                     <div class="form-group">
                         <label for="image_frame" class="col-sm-3 control-label">Image frame</label>
                         <div class="col-sm-6">
                           <select name="image_frame" form="featureform" id="image_frame" class="form-control" value="{{ $feature->image_frame }}">
                             <option value="none">none</option>
                             <option value="iphone5s" {{$feature->image_frame=='iphone5s' ? 'selected':'' }}>iphone5s</option>
                             <option value="ipad" {{$feature->image_frame=='ipad' ? 'selected':'' }}>ipad</option>
                             <option value="desktop" {{$feature->image_frame=='desktop' ? 'selected':'' }}>desktop</option>
                           </select>
                         </div>
                     </div>


                     <!-- Product image link -->
                     <div class="form-group">
                         <label for="image" class="col-sm-3 control-label">Image link</label>
                         <div class="col-sm-6">
                             <input type="text" name="image" id="image" class="form-control" value="{{ $feature->image }}">
                         </div>
                     </div>

                     <!-- Add Feature Button -->
                     <div class="form-group">
                         <div class="col-sm-offset-3 col-sm-6">
                             <button type="submit" class="btn btn-default">
                                 <i class="fa fa-btn fa-plus"></i>Add Feature
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

@endsection

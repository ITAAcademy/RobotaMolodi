@extends('app')
@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-10 col-md-offset-1">
             <form class="form-horizontal" role="form" method="POST" action="" id="my-form">
                 <div class="form-group">
                     <label class="col-md-4 control-label">Title</label>
                     <div class="col-md-6">
                         <input type="text" class="form-control" name="title">
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="col-md-4 control-label">Body</label>
                     <div class="col-md-6">
                         <textarea name="body"></textarea>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- Scripts -->
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
 <!-- Laravel Javascript Validation -->
 <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\StoreBlogPostRequest', '#my-form') !!};
    @stop
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style type="text/css">
    .picture{
        width:15%;
    }
</style>
<h1>Index</h1>
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
<button href="{{ route('news.create') }}" type="button" class="btn btn-default">Create</button>
<a href="http://robotamolodi.local/news/create" class="btn btn-info" role="button">Link Button</a>
@foreach ($news as $new)
<p> {{ $new->name }}</p>
<p> {!!  $new->description !!}</p>
@if($new->img!='Not picture')

    <img class="picture" src="{{ asset($patch.$new->img) }}">
@endif

<button type="button" class="btn btn-primary">Update</button>
<button type="button" class="btn btn-primary">Delete</button>
@endforeach

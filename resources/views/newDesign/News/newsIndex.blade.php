<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<h1>Index</h1>
<button href="{{ route('news.create') }}" type="button" class="btn btn-default">Create</button>
@foreach ($news as $new)
<p> {{ $new->name }}</p>
<p> {{ $new->description }}</p>
<img src="{{ asset($new->img) }}">
<button type="button" class="btn btn-primary">Update</button>
<button type="button" class="btn btn-primary">Delete</button>
@endforeach
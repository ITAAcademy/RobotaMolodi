<input type="text" class="form-control" name="name" value="name">

@for ($i=0; $i < 2; $i++)
    <input type="text" name="items[{{ $i }}]" value="{{ $i }}">
    @endforeach
@extends('newDesign.layouts.admin')

@section('content')
<div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin">
  <table class="striped bordered highlight">
      <thead>
      <tr>
          <th>Users</th>
          <th>Is Admins</th>
          <th>Edit user</th>
      </tr>
      </thead>
       <h1>You can change user status</h1>

      @foreach ($users as $new)
      <tr>
          <td>{{ $new->name }}</td>

        @if($new->role_id == '1')

          <td >

                  <input type="checkbox" id="test5" checked="checked"/>
                  <label for="test5"></label>

          </td>
                <td>

                  <a href="{!! route('changeRole',$new->id) !!}" class="btn-floating green darken-1"><i class="material-icons">cached</i></a>

                </td>
        @else
            <td>
                        <input id="{{$new->id}}" type="checkbox" class="btn btn-link" >
            </td>
                  <td>
                    <a href="{!! route('changeRole',$new->id) !!}" class="btn-floating green darken-1"><i class="material-icons">cached</i></a>
                  </td>

        @endif
      </tr>
      @endforeach
    </table>
    <div class="center">
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a href="#" class="active">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
  </div>
</div>
</div>
@endsection

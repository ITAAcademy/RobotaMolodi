@extends('newDesign.layouts.admin')

@section('content')
<div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin">
  <table class="table table-bordered table-hover ">
      <thead>
      <tr>
          <th scope="col" class="col-md-8">Users</th>
          <th scope="col" class="col-md-2">Is Admins</th>
          <th scope="col" class="col-md-2">Edit user</th>
      </tr>
      </thead>
       <h1>You can change user status</h1>

      @foreach ($users as $new)
      <tr>
          <td><h4>{{ $new->name }}</h4></td>

        @if($new->role_id == '1')

          <td style="text-align: center">
              <div class="form-group">
                      <input  type="checkbox" class="btn btn-link fa set-main" checked>
              </div>
          </td>
                <td>
                  <a href="{!! route('changeRole',$new->id) !!}" class="btn btn-success btn-group optionBtn">
                      Change
                  </a>
                </td>
        @else
            <td style="text-align: center">
                <div class="form-group">
                        <input id="{{$new->id}}" type="checkbox" class="btn btn-link fa set-main" >
                </div>
            </td>
                  <td>
                    <a href="{!! route('changeRole',$new->id) !!}" class="btn btn-success btn-group optionBtn">
                        Change
                    </a>
                  </td>

        @endif
      </tr>
      @endforeach
    </table>
</div>
@endsection

<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
@extends('newDesign.layouts.admin')
@section('content')
<div class="contentAndmin">
    <table class="striped bordered highlight">
        <h4>Змінити статус користувача</h4>
        <thead>
        <tr>
            <th class="s4 m4 l5 xl5">Username</th>
            <th class="s3 m3 l2 xl2">is Admin</th>
            <th class="s5 m5 l5 xl5">Set admin</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $new)
            <tr>
                <td>{{ $new->name }}</td>
                @if($new->role_id == '1')
                    <td>
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
        </tbody>
    </table>
    
 @include('newDesign.paginator', ['paginator' => $users]) 

</div>


@endsection


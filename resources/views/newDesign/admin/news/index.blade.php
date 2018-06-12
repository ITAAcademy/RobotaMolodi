<link href="{{ asset('/css/newsList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
@extends('newDesign.layouts.admin')
@section('content')
    <div class="contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div>
            <h4 style="text-align: center">Список новин</h4>
        </div>
        <div class="fixed-action-btn">
            <a href="{{ URL::route('admin.news.create') }}"
               class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
        </div>
        <table class="striped bordered highlight">
            <thead>
            <tr>
                {{--<th class="s1 m2 l2 xl1">Id</th>--}}
                <th class="s3 m3 l3 xl3">Title</th>
                <th class="s2 m2 l3 xl3">Short description</th>
                <th class="s3 m3 l3 xl3">Picture</th>
                <th class="s1 m1 l1 xl1">Published</th>
                <th class="s3 m3 l2 xl2">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($news as $new)
                <tr>
                    {{--<td scope="row">{{ $new->id }}</td>--}}
                    <td style="text-align: center">
                        <h5>{{ $new->name }}</h5>
                    </td>
                    <td>
                        {!! substr($new->description, 0, 100)."..." !!}
                    </td>
                    <td>
                        @if($new->img!='Not picture')
                            <img class="picture" src="{{ asset($new->getPath().$new->img) }}" style="width: 100%">
                        @else
                            Not picture
                        @endif
                    </td>
                    <td>
                        <button id="{{$new->id}}" value="{{$new->published}}" class="btn btn-flat fa set-main"></button>
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', $new->id) }}">
                            <i class="fa fa-edit"></i>
                        </a><br>

                        <a href="{{ route('admin.news.show', $new->id) }}">
                            <i class="fa fa-eye"></i>
                        </a><br>

                        {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['admin.news.destroy', $new->id],
                        'onsubmit' => 'return confirm("Are you sure you want to delete this news?")'
                        ]) !!}
                        {!! Form::submit ('&#xf014;', [' class' => 'fa']) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            <script>
                $(document).ready(function () {
                    $("button[value='0']").addClass("fa-square-o");
                    $("button[value='1']").addClass("fa-check-square-o");
                    $("button.fa").click(function () {
                        var id = $(this).attr('id');
                        $.ajax({
                            url: '/admin/news/updatePublished/' + id,
                            methof: 'GET',
                            success: function (published) {
                                if (published > 0) {
                                    return $("button#" + id).removeClass('fa-square-o').addClass('fa-check-square-o');
                                } else {
                                    return $("button#" + id).removeClass('fa-check-square-o').addClass('fa-square-o');
                                }
                            }
                        });
                    });
                })
            </script>

            </tbody>
        </table>
        @include('newDesign.paginator', ['paginator' => $news])
    </div>
    <script>
        $(document).ready(function () {
            $("button[value='0']").addClass("fa-square-o");
            $("button[value='1']").addClass("fa-check-square-o");
            $("button.fa").click(function () {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/news/updatePublished/' + id,
                    methof: 'GET',
                    success: function (published) {
                        if (published > 0) {
                            return $("button#" + id).removeClass('fa-square-o').addClass('fa-check-square-o');
                        } else {
                            return $("button#" + id).removeClass('fa-check-square-o').addClass('fa-square-o');
                        }
                    }
                });
            });
        });
    </script>
@stop

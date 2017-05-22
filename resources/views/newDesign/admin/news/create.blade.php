@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')
    <h1>Створити новину</h1>

    {!! Form::open(array('url' => '/admin/news','files'=>true)) !!}
        @include('newDesign.admin.news._form')
    {!! Form::close() !!}

    <script type="text/javascript">
        CKEDITOR.replace('editor2');
    </script>
@endsection

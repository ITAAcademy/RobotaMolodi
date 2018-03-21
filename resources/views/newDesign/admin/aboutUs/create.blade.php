@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
    @endsection
@section('content')

    <div class=" col l10 col s10 col m10 contentAndmin">
        <center><h3>Adding Information About US</h3></center>

    <div class="row">
        {!! Form::open(['route' =>['admin.about-us.store']]) !!}


                {{--<div class="file-field input-field">--}}
                    {{--Icon--}}
                    {{--<div class="btn">--}}
                        {{--<span>Icon</span>--}}
                        {{--<input type="file">--}}
                    {{--</div>--}}
                    {{--<div class="file-path-wrapper">--}}
                        {{--<input class="file-path validate" type="text">--}}
                    {{--</div>--}}
                {{--</div>--}}


                    <div class="input-field col s12">

                        {{--title--}}
                        <input id="input_text" type="text" data-length="250" name="title">
                        <label for="input_text">Title</label>
                    </div>


                    <div class="input-field col s12">

                    {{--short description--}}
                    <input id="input_text" type="text" data-length="250" name="short_description">
                    <label for="input_text">Short description</label>
                </div>

                <div class="input-field col s12">
                    {{--description--}}
                    {{--<textarea id="textarea1" id ='editor2' class="materialize-textarea" data-length="5000"></textarea>--}}
                    {{--<label for="textarea1">Full description</label>--}}
                    {{--<div class="form-group">--}}

                        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    <br>
                    <br>
                        {!! Form::textarea('description', null, ['class' => 'form-control',
                                                                 'id'=>'editor2']) !!}

                    {{--</div>--}}

                </div>



                    <div class="input-field col s12">
                        {{--Year--}}
                        <input id="input_text" type="number" data-length="4" name="year">
                        <label for="input_text">Year</label>

                    </div>

                    <div class=" col s12">

                        <input type="checkbox" id="indeterminate-checkbox" name="published"/>
                        <label for="indeterminate-checkbox">Published</label>

                    </div>
                {{--<div class="input-field col s12">--}}
                    {{--Gallery--}}


                    {{--<div class="file-field input-field">--}}
                        {{--<div class="btn">--}}
                           {{--<i class="material-icons">add_circle_outline</i>--}}
                            {{--<input type="file">--}}
                        {{--</div>--}}
                        {{--<div class="file-path-wrapper">--}}
                            {{--<input class="file-path validate" type="text">--}}
                        {{--</div>--}}

                {{--</div>--}}



                <div class="input-field col s3 offset-s9">
                    {{--save button--}}
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>

                </div>
        {{--{{ csrf_token() }}--}}
        {!! Form::close() !!}
    </div>
    </div>
    <script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
@endsection
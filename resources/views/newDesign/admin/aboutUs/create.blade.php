@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@endsection
@section('content')

    <div class=" col l10 col s10 col m10 contentAndmin">
        <center><h3>Adding Information About US</h3></center>

        <div class="row">
            {!! Form::open(['route' =>['admin.about-us.store'], 'files'=>true]) !!}


            <div class="file-field input-field">
                <div class="btn">
                    <span>Icon</span>
                    <input type="file" name="icon" >
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="text_icon">
                </div>
            </div>
            <img id="ico" class="imageIcon" src="#" alt="icon"/>

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


                {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                <br>
                <br>
                {!! Form::textarea('description', null, ['class' => 'form-control',
                                                         'id'=>'editor2']) !!}
            </div>



            <div class="input-field col s12">
                {{--Year--}}
                <input id="input_text" class="year" type="number" data-length="4" name="year">
                <label for="input_text">Year</label>

            </div>

            <div class=" col s12">

                <input type="checkbox" id="indeterminate-checkbox" name="published"/>
                <label for="indeterminate-checkbox">Published</label>

            </div>

            <div class="input-field col s12">
                {{--Gallery--}}


                <div class="file-field input-field">
                    <div class="btn">
                        <i class="material-icons">add_circle_outline</i>
                        <input type="file" id="multi_files" name="multi_files[]" multiple />
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>

                </div>

                <output id="list"></output>

                <div class="input-field col s3 offset-s9">
                    {{--save button--}}
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        $().ready(function () {
            $('.btn').on('click',function () {
                var year = $('.year').val();
                if(year < 1990 || year > 2018 ){
                    alert('Please enter the  correct date from 1980 to 2018 year !');
                    $('.year').empty();
                }

            })

        });
    </script>


    <script>
        //Script for icon
        $(function () {
            $(":file").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $('#ico').attr('src', e.target.result);
        };

    </script>

    <script>
        //Script for multi upload images

        function handleFileSelect(evt) {
            var files = evt.target.files; // FileList object

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, file; file = files[i]; i++) {
                // Only process image files.
                if (!file.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function(theFile) {

                    return function(e) {

                        // Render thumbnail.
                        var span = document.createElement('span');
                        span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
                        document.getElementById('list').insertBefore(span, null);

                    };

                })(file);
                // Read in the image file as a data URL.
                reader.readAsDataURL(file);
            }
        }
        document.getElementById('multi_files').addEventListener('change', handleFileSelect, false);
    </script>

@endsection
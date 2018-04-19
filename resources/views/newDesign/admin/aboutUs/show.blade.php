@extends('newDesign.layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col l9">
                    <h3>{{$aboutUs->title}}</h3>
                    <br>
                    <h5>Short description: </h5><br>
                    <p>

                        {{$aboutUs->short_description}}

                    </p>
                    <br>
                    <h5>   Description: </h5>
                    <br>
                    <p>
                        {{$aboutUs->description}}

                    </p>
                    <h5>Year: </h5>
                    <p>
                        {{$aboutUs->year}}
                    </p>

                    @if($aboutUs->published == '1')
                        <td>
                            <input type="checkbox" disabled="disabled" class="filled-in" id="filled-in-box" checked="checked" />
                            <label for="filled-in-box"></label>
                        </td>
                    @else
                        <td>
                            <input type="checkbox" disabled="disabled" class="filled-in" id="filled-in-box"/>
                            <label for="filled-in-box"></label>
                        </td>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
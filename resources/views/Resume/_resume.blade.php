<link href="{{ asset('/css/cabinet/cabinetMyResVacCom.css') }}" rel="stylesheet">

{!!Form::open(['route' => 'resumeDestroy', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
<input type="hidden" name="filterName" id="filterName" xmlns="http://www.w3.org/1999/html"/>
<input type = "hidden" name = "filterValue" id = "filterValue"/>
{!!Form::close()!!}

    @forelse ($resumes as $resume)
    <div class="one-for-cabinet">
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-orange" id="vimg">
                    <a href="{{route('resume.show', $resume->id)}}">
                        @if(File::exists(public_path('image/resume/'.$resume->user_id.'/'.$resume->image)) and $resume->image != '')
                            {!! Html::image('image/resume/'.$resume->user_id.'/'.$resume->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-10">
                <div class="panel-heading-cabinet">
                    <p class="position-cabinet">
                        <a class="orangColor-cabinet-name" href="{{route('resume.show', $resume->id)}}">{!!$resume->position!!}</a>
                        <br>
                    </p>
                    <p class="price-cabinet">
                        <span>{{$resume->salary}} - {{$resume->salary_max}} {{ $resume->currency->currency }}</span>
                    </p>
                    <p class="description-cabinet">{!! strip_tags($resume->description) !!}</p>
                    <p class="name-cabinet"> {!!strip_tags($resume->name_u)!!}</p>
                </div>
                <div>
                    <p class="cityTime-cabinet">
                        <span class="description-cabinet">{{$resume->city->name}}</span>
                        <span id="yellowCircle-cabinet">&#183;</span>
                        <span class="updateDate-cabinet">{{ date('j m Y', strtotime($resume->updated_at))}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet" href="/resume/{{$resume->id}}/destroy" onclick="return ConfirmDelete();">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        <span>{{ trans('main.delete') }}</span>
                    </a>
                </div>
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet" href="/resume/{{$resume->id}}/edit">
                        {!! Html::image('image/edit.png', 'del') !!}
                        <span>{{ trans('main.edit') }}</span>
                    </a>
                </div>
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet" href="#">
                        {!! Html::image('image/podiumOrenge.png', 'del') !!}
                        <span> {{ trans('main.placetop') }}</span>
                    </a>
                </div>
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet update-date-cab-res" href="{{ route('updateCabinetResumeDate', $resume->id) }}">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span>{{ trans('main.updatedate') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr class="line-sort-box">
        <div id="changeImageBox" class="modal fade">
            @include('newDesign.cropModal')
        </div>
    @empty
        <span>{{ trans('resume.noresume') }}.<a href="{{ url('/resume/create') }}"> {{ trans('resume.create') }}</a></span>

    @endforelse
{{--{!! $resumes->render(new App\Presenters\BootstrapTwoPresenter($resumes)) !!}--}}

{!!Html::script('js/crop.js')!!}
<script>
    $(document).ready(function () {
        $('#changeImage').on('click', function () {
            $('#fileImg').click();
        });

        $('#fileImg').on('change', function (e) {
            $('#changeImageBox').modal({
                show: true,
                backdrop: 'static'
            });
            crop(e, 'img-src', '#crop', '#changeImageBox');
        });

        $('#changeImageBox').on('hidden.bs.modal', function () {
            if($('#coords').val()){
                var $input = $("#fileImg");
                var fd = new FormData;
                fd.append('fileImg', $input.prop('files')[0]);
                fd.append('coords', $('.coords').val());
                fd.append('id', $('.coords').attr('data-id'));
                $.ajax({
                    url: '{{ route('upimg') }}',
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        $('#vimg img').attr('src', window.location.origin + '/' + data);
                    }
                });
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $('#deleteImage').on('click', function () {
            if(ConfirmDelete()){
                $.ajax({
                    url: '{{ route('deleteimg') }}',
                    data: {'id' : $('.coords').attr('data-id')},
                    type: 'POST',
                    success: function (data) {
                        $('#vimg img').attr('src', window.location.origin + '/' + data);
                    }
                })
            }
        })
    });

    function ConfirmDelete() {
        var conf = confirm("Ви дійсно хочете видалити резюме?");

        if(conf){
            return true;
        } else{
            return false;
        }
    }

    $('.update-date-cab-res').click(function (e) {
        var href = $(this).attr('href');
        var dateElement = $('.updateDate-cabinet');
        e.preventDefault();
        $.ajax({
            url: href,
            method: 'post',
            success: function (data) {
                dateElement.text(data);
                dateElement.css('backgroundColor','orange');
                dateElement.animate({ backgroundColor: "white" }, "slow");
            }
        })
    })
</script>

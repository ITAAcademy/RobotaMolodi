{!! $companies->render(new App\Presenters\BootstrapTwoPresenter($companies)) !!}
    <address>
        @foreach($companies as $company)
        <article>
            <div class="col-xs-3 imeg-companies-list">
                @if(File::exists(public_path('image/vacancy/' . $company->company_id . '.png')))
                    {!! Html::image('image/vacancy/' . $company->company_id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $company->company_id . '.jpg')))
                    {!! Html::image('image/vacancy/' . $company->company_id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $company->company_id . '.jpeg')))
                    {!! Html::image('image/vacancy/' . $company->company_id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $company->company_id . '.bmp')))
                    {!! Html::image('vacancies' . $company->company_id . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    <p class="nologo-companies-list" style="margin-top: 10px; font-size: 15px">логотип вiдсутнiй</p>
                @endif
            </div>
            <a href="{{$url}}/{{$company->id}}"  class="link">
                <div class="list">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                       <h3 class="list-group-item-heading panel-title">{{$company->company_name}}</h3>
                        </div>
                        <div class="panel-body">
                            <h4 class="list-group-item-heading">{{ $company->company_email}}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </article>
        @endforeach
    </address>
{!! $companies->render(new App\Presenters\BootstrapTwoPresenter($companies)) !!}
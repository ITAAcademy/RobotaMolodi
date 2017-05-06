{!! $companies->render(new App\Presenters\BootstrapTwoPresenter($companies)) !!}
    <address>
        @foreach($companies as $company)
        <article>
            <div class="col-xs-3 imeg-companies-list">
                @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)) and $company->image != '')
                    {!! Html::image('image/company/' . $company->users_id .'/'. $company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    <h3 class="nologo">логотип вiдсутнiй</h3>
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
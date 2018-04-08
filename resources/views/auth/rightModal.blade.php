<div id="rightModal" class="modal fade">
    <div class="modal-content">
        <ul id="modalTab" class="nav nav-tabs">
            <li>
                <a data-toggle="tab" href="#panel1" class="btn-modal-enter">
                    <div class="leftBtn-modal-tab">
                        <span>{!! Html::image('image/entry.png',trans('header.home'),['id'=>'entry']) !!}</span>
                        <u>{{ trans('auth.signin') }}</u>
                    </div>
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#panel2" class="btn-modal-reg">
                    <span>{!! Html::image('image/registry.png',trans('header.home'),['id'=>'registry']) !!}</span>
                    <u>{{ trans('auth.signup') }}</u>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="panel1" class="tab-pane fade in active">
                <div>
                    @include('auth.formLogin')
                </div>
            </div>
            <div id="panel2" class="tab-pane fade">
                <div>
                    @include('auth.formRegister')
                </div>
            </div>
        </div>
    </div>
    
</div>

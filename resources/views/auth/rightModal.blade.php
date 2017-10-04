
<div id="rightModal" class="modal fade">
    <div class="modal-content">
        <ul id="modalTab" class="nav nav-tabs">
            <li>
                <a data-toggle="tab" href="#panel1" class="btn-modal-enter">
                    <div class="leftBtn-modal-tab">
                        <span>{!! Html::image('image/entry.png','Головна',['id'=>'entry']) !!}</span>
                        <u>Вхід</u>
                    </div>
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#panel2" class="btn-modal-reg">
                    <span>{!! Html::image('image/registry.png','Головна',['id'=>'registry']) !!}</span>
                    <u>Реєстрація</u>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="panel1" class="tab-pane fade in active">
                <div>
                    @include('auth.formLogin')
                    <div class="modal-social-icon">
                        <p>або</p>
                        <div>Вхід через соціальні мережі</div>
                            <i class="fa-soc fa fa-twitter-square fa-3x" aria-hidden="true"></i>
                            <i class="fa-soc fa fa-google-plus-square fa-3x" aria-hidden="true"></i>
                            <i class="fa-soc fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                            <i class="fa-soc fa fa-linkedin-square fa-3x" aria-hidden="true"></i>
                            <a href="auth/intita"><span class="logoINTITA"></span></a>
                    </div>
                </div>
            </div>
            <div id="panel2" class="tab-pane fade">
                <div>
                    @include('auth.formRegister')
                    <div class="modal-social-icon">
                        <p>або</p>
                        <div>Реєстрація через соціальні мережі</div>
                        <i class="fa-soc fa fa-twitter-square fa-3x" aria-hidden="true"></i>
                        <i class="fa-soc fa fa-google-plus-square fa-3x" aria-hidden="true"></i>
                        <i class="fa-soc fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                        <i class="fa-soc fa fa-linkedin-square fa-3x" aria-hidden="true"></i>
                        <a href="auth/intita"><span class="logoINTITA"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

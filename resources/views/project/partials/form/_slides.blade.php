<div id="slides">
    <div class="container-fluid">
        <div class="row" v-for="slide in slides">
            <div class="col-xs-6">
                <input-label></input-label>
                <input-file></input-file>
            </div>
            <div class="col-xs-6">
                <input-label></input-label>
                <input-text></input-text>
            </div>
        </div>
    </div>
    <a href="#"  class="controlSlide" @click="addSlide"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>Додати слайд</a>
    <a href="#"  class="controlSlide" @click="delSlide">Видалити зі списку</a>
</div>

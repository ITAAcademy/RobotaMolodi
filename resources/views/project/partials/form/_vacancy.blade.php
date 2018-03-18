<h2 class="text-center">Вакансії на проект</h2>
<template v-for="(vacancy,index) in vacancies">
    <div class="container">
        <div class="row">
            <div class="col-sm-10" v-bind:class="{ hidden: vacancy.destroy  }">
                <div class="form-group">
                    <input
                        type="text"
                        :name="'vacancies[' + index + '][id]'"
                        v-model="vacancy.id"
                        class="hidden">
                    <input
                        type="text"
                        :name="'vacancies[' + index + '][destroy]'"
                        v-model="vacancy.destroy"
                        class="hidden">
                    <label class="col-sm-4 control-label">Введіть назву вакансії</label>
                    <div class="col-sm-8">
                        <input
                            type="text"
                            :name="'vacancies[' + index + '][name]'"
                            class="form-control"
                            v-model="vacancy.name">
                    </div>
                    <span class="help-block">@{{ vacancy.error.name }}</span>
                </div>

                <listoption v-bind:op="vacancy.subList.options" v-bind:index="index"></listoption>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Опис вакансії</label>
                    <div class="col-sm-8">
                      <input
                        type="text"
                        :name="'vacancies[' + index + '][description]'"
                        class="form-control"
                        v-model="vacancy.description">
                        <span class="help-block">@{{ vacancy.error.description }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Кількість вакансій</label>
                    <div class="col-sm-4">
                      <input
                        type="text"
                        :name="'vacancies[' + index + '][total]'"
                        class="form-control"
                        v-model="vacancy.total">
                        <span class="help-block">@{{ vacancy.error.total }}</span>
                    </div>
                    <div class="col-sm-4">
                      <input
                        type="text"
                        :name="'vacancies[' + index + '][free]'"
                        class="form-control"
                        v-model="vacancy.free">
                        <span class="help-block">@{{ vacancy.error.free }}</span>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-sm-2" v-bind:class="{ hidden: vacancy.destroy  }">
                <div class="btn btn-danger" @click="removeVacancy(vacancy)" style="color: white; cursor:pointer">Del.</div>
            </div>
        </div>
    </div>
</template>

<div class="btn-group dropup">
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Додати вакансію
    </button>
    <ul class="dropdown-menu">
        <li style="background: #9d9d9d; padding-left: 3px;">Обрати з існуючих</li>
        <li onmouseover="this.style.backgroundColor='#81a2be'" onmouseout="this.style.backgroundColor=''" v-for="userVacancy in userVacancies" :value="userVacancy.id" v-on:click="getUserVacancy" class="dropdown-item" type="button" style="padding-left: 3px;">   @{{ userVacancy.position }}</li>
        <li role="separator" class="divider"></li>
        <li style="background: #9d9d9d; padding-left: 3px;" v-on:click="addVacancy" class="dropdown-item" type="button">Додати нову</li>
    </ul>
</div>
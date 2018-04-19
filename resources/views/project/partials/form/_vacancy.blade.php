<h2 class="text-center">{{ trans('project/description.projectVacancies') }}</h2>
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
                    <label class="col-sm-4 control-label">
                    </label>
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
                    <label class="col-sm-4 control-label">{{ trans('project/description.projectVacancyDescription') }}</label>
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
                    <label class="col-sm-4 control-label">{{ trans('project/description.projectVacanciesAmount') }}</label>
                    <div class="col-sm-2">
                      <input
                        type="text"
                        :name="'vacancies[' + index + '][total]'"
                        class="form-control"
                        v-model="vacancy.total">
                        <span class="help-block">@{{ vacancy.error.total }}</span>
                    </div>
                    <label class="col-sm-4 control-label">{{ trans('project/description.projectVacanciesFree') }}</label>
                    <div class="col-sm-2">
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
        {{ trans('project/description.projectAddVacancy') }}
    </button>
    <ul class="dropdown-menu ulAddVacProject">
        <li class="liFooterAddVacProject">{{ trans('project/description.choosefromexisting') }}</li>
        <li class="dropdown-item liAddVacProject" v-for="userVacancy in userVacancies" :value="userVacancy.id" v-on:click="getUserVacancy" type="button">@{{ userVacancy.position }}</li>
        <li class="divider" role="separator"></li>
        <li class="dropdown-item liFooterAddVacProject" v-on:click="addVacancy" type="button">{{ trans('project/description.addnew') }}</li>
    </ul>
</div>


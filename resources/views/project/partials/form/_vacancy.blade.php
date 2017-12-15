<h2 class="text-center">Вакансії на проект</h2>
<template v-for="(vacancy,index) in vacancies">
    <div class="form-group">
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

    <listoption v-bind:op="vacancy.options" v-bind:index="index"></listoption>

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
    <hr>
    <br>
</template>
<br>
<div @click="addVacancy" class="btn btn-default btn-xs">Додати вакансію +</div>
<br><br>

<h2 class="text-center">Вакансії на проект</h2>
<template v-for="(vacancy,index) in vacancies">
    <div class="form-group">
        <label class="col-sm-4 control-label">Введіть назву вакансії</label>
        <div class="col-sm-8">
            <input
                type="text"
                name=""
                class="form-control"
                v-model="vacancy.name.value">
        </div>
        <span class="help-block">@{{ vacancy.name.error }}</span>
    </div>

    <listoption v-bind:op="vacancy.options"></listoption>

    <div class="form-group">
        <label class="col-sm-4 control-label">Опис вакансії</label>
        <div class="col-sm-8">
          <input
            type="text"
            name=""
            class="form-control"
            v-model="vacancy.info.value">
            <span class="help-block">@{{ vacancy.info.error }}</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Кількість вакансій</label>
        <div class="col-sm-4">
          <input
            type="text"
            name=""
            class="form-control"
            v-model="vacancy.total.value">
            <span class="help-block">@{{ vacancy.total.error }}</span>
        </div>
        <div class="col-sm-4">
          <input
            type="text"
            name=""
            class="form-control"
            v-model="vacancy.free.value">
            <span class="help-block">@{{ vacancy.free.error }}</span>
        </div>
    </div>
    <br>
    <hr>
    <br>
</template>
<br>
<div @click="addVacancy" class="btn btn-default btn-xs">Додати вакансію +</div>
<br><br>

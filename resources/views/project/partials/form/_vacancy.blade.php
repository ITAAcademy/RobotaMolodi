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
<br>
<div @click="addVacancy" style="color: #f76533; text-decoration:underline; cursor:pointer">Додати вакансію +</div>
<br><br>

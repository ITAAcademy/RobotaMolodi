<h2 class="text-center">Команда проекту</h2>
<template v-for="(member,index) in members">
    <div class="form-group">
        <label class="col-sm-4 control-label">Фото</label>
        <div class="col-sm-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <input
                            type="file"
                            :name="'member[' + index + '][avatar]'"
                            value="">
                    </div>
                    <div class="col-sm-8">
                        <img :src="member.avatarSrc" class="img-fluid" alt="Avatar">
                    </div>
                </div>
            </div>
        </div>
        <span class="help-block">@{{ member.error.avatarSrc }}</span>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Ім'я та прізвище</label>
        <div class="col-sm-8">
            <input
                type="text"
                :name="'member[' + index + '][name]'"
                v-model="member.name"
                class="form-control">
        </div>
        <span class="help-block">@{{ member.error.name }}</span>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Позиція</label>
        <div class="col-sm-8">
            <input
                type="text"
                :name="'member[' + index + '][position]'"
                v-model="member.position"
                class="form-control">
        </div>
        <span class="help-block">@{{ member.error.position }}</span>
    </div>
    <br>
    <hr>
    <br>
</template>
<br>
<div @click="addMember" class="btn btn-default btn-xs">Додати члена команди +</div>
<br>
<br>

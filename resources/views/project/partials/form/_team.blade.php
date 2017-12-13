<h2 class="text-center">Команда проекту</h2>
<template v-for="(member,index) in members">
    <div class="form-group">
        <input
            type="text"
            :name="'members[' + index + '][id]'"
            v-model="member.id"
            class="hidden">
        <label class="col-sm-4 control-label">Фото</label>
        <div class="col-sm-8">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <input
                            type="file"
                            :name="'members[' + index + '][avatar]'"
                            value="">
                    </div>
                    <div class="col-sm-8">
                        <img :src="member.avatarSrc" class="img-fluid" alt="Avatar">
                    </div>
                </div>
            </div>
            <div v-if="member.error">
                <span class="help-block">@{{ member.error.avatarSrc }}</span>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Ім'я та прізвище</label>
        <div class="col-sm-8">
            <input
                type="text"
                :name="'members[' + index + '][name]'"
                v-model="member.name"
                class="form-control">
                <div v-if="member.name">
                    <span class="help-block">@{{ member.error.name }}</span>
                </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Позиція</label>
        <div class="col-sm-8">
            <input
                type="text"
                :name="'members[' + index + '][position]'"
                v-model="member.position"
                class="form-control">
                <div v-if="member.position">
                    <span class="help-block">@{{ member.error.position }}</span>
                </div>
        </div>
    </div>
    <br>
    <div v-if="index == members.length - 1">
        <br>
        <div @click="addMember" style="color: #f76533; text-decoration:underline; cursor:pointer">Додати члена команди +</div>
        <br>
        <div @click="removeMember" style="color: #f00; text-decoration:underline; cursor:pointer">Видалити члена команди -</div>
    </div>
    <hr>
    <br>
</template>

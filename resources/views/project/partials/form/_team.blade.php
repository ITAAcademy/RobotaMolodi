<p class="text-center">Команда проекту</p>
<div id="form_members">
    <div class="panel panel-default" v-for="(member,index) in members">
        <div class="form-group">
            <label class="col-sm-4 control-label">Фото</label>
            <div class="col-sm-8">
                <input type="file" :name="'members[' + index + '][avatar]'" @change="onFileChange(index)">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Імя та прізвище</label>
            <div class="col-sm-8">
                <input type="text" :name="'members[' + index + '][name]'" class="form-control" v-model="member.name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Посада</label>
            <div class="col-sm-8">
                <input type="text" :name="'members[' + index + '][position]'" class="form-control" v-model="member.position">
            </div>
        </div>
    </div>

    <a href="#"  class="controlMember" @click="addRow"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>Додати члена команди</a>
    <a href="#"  class="controlMember" @click="delRow">Видалити зі списку</a>
</div>

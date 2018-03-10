<h2 class="text-center">{{ trans('project/description.projectteam') }}</h2>
<div class="container">
    <template v-for="(member,index) in members">
        <div class="row">
            <div class="col-sm-10" v-bind:class="{ hidden: member.destroy  }">
                <div class="form-group">
                    <input
                        type="text"
                        :name="'members[' + index + '][id]'"
                        v-model="member.id"
                        class="hidden">
                    <input
                        type="text"
                        :name="'members[' + index + '][destroy]'"
                        v-model="member.destroy"
                        class="hidden">
                    <label class="col-sm-4 control-label">{{ trans('project/description.projectphoto') }}</label>
                    <div class="col-sm-8">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input
                                            type="file"
                                            class="inputImg" 
                                            :name="'members[' + index + '][avatar]'"
                                            value="">
                                    </div>
                                    <div class="col-sm-8">
                                        <img :src="member.avatar" class="prevImg img-responsive img-rounded" alt="Avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="member.error">
                            <span class="help-block">@{{ member.error.avatar }}</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">{{ trans('project/description.projectmembername') }}</label>
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
                    <label class="col-sm-4 control-label">{{ trans('project/description.projectposition') }}</label>
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
            </div>
            <div class="col-sm-2" v-bind:class="{ hidden: member.destroy  }">
                <div class="btn btn-danger" @click="removeMember(member)" style="color: white; cursor:pointer">Del.</div>
            </div>
            </div>
    </template>
</div>

<div @click="addMember" style="color: #f76533; text-decoration:underline; cursor:pointer">{{ trans('project/description.projectaddnewmember') }} +</div>
<br>

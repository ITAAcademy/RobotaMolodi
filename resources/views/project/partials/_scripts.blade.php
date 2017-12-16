<script type="text/x-template" id="option-template">
    <div>
        <div class="form-group" v-for="(opt,j) in op">
            <label class="col-sm-4 control-label">@{{ opt.name }}</label>
            <div class="col-sm-6">
                <div class="container-fluid">
                    <div class="row">
                        <template v-for="(vv,i) in opt.values">
                            <div class="col-sm-10" v-bind:class="{ hidden: vv.destroy  }">
                              <input
                                  type="text"
                                  :name="'vacancies[' + index + '][' + opt.groupId + '][' + i + '][id]'"
                                  class="hidden"
                                  v-model="vv.id">
                              <input
                                type="text"
                                :name="'vacancies[' + index + '][' + opt.groupId + '][' + i + '][destroy]'"
                                class="hidden"
                                v-model="vv.destroy">
                                <input
                                  type="text"
                                  :name="'vacancies[' + index + '][' + opt.groupId + '][' + i + '][value]'"
                                  class="form-control"
                                  v-model="vv.value">
                                  <br>
                            </div>
                            <div class="col-sm-2" v-bind:class="{ hidden: vv.destroy  }">
                                <div @click="removeField(vv, j)" style="color: #f00; text-decoration:underline; cursor:pointer">Del.</div>
                            </div>
                      </template>
                  </div>
              </div>
            </div>
            <div class="col-sm-2">
                <div @click="addField(j)" style="color: #f76533; text-decoration:underline; cursor:pointer">Plus</div>
            </div>
            <hr>
        </div>
    </div>
</script>

<script>

window.onload = function(){
    $(function () {
        $("#logoProject").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function imageIsLoaded(e) {
                    $('#prevLogo').attr('src', e.target.result)
                        .css('maxWidth', '100%');
                    };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    Vue.component('listoption', {
      props: ['op', 'index'],
      template: '#option-template',
      methods: {
          addField: function(index){
              this.op[index].values.push({
                  value: '',
                  error: null
              });
          },
          removeField: function(option, index){
              if(isNaN(option.id))
              {
                  var v = this.op[index].values;
                  v.splice(v.indexOf(option), 1)
              } else {
                  if(option.hasOwnProperty('destroy'))
                      option.destroy = true;
                  else
                      Vue.set(option, 'destroy', true);
              }
          }
      }
    })

    var app = new Vue({

      el: '#app',

      data: {
        members: JSON.parse('{!! $members->toJson() !!}'),
        vacancies: JSON.parse('{!! $vacancies->toJson() !!}'),
      },

      methods: {
        addMember: function () {
          this.members.push(
              {
                  name: '',
                  position: '',
                  avatarSrc: '',
                  error: {
                      name: null,
                      position: null,
                      avatarSrc: null,
                  },
              });
          },
        removeMember: function (member) {
            if(isNaN(member.id))
            {
                    this.members.splice(this.members.indexOf(member), 1)
            } else {
                if(member.hasOwnProperty('destroy'))
                    member.destroy = true;
                else
                    Vue.set(member, 'destroy', true);
            }
         },
         addVacancy: function(){
              this.vacancies.push(
                  {
                      name: '',
                      info: '',
                      total: '',
                      free: '',
                      error: [],
                      options: [
                          {
                              name: 'Essential Skills',
                              groupId: 1,
                              values: [
                                  {
                                      value: 'fd',
                                      error: null
                                  }
                              ]
                          },
                          {
                              name: 'Personal Skills',
                              groupId: 2,
                              values: [
                                  {
                                      value: '',
                                      error: null
                                  }
                              ]
                          },
                          {
                              name: 'Would be good plus',
                              groupId: 3,
                              values: [
                                  {
                                      value: '',
                                      error: null
                                  }
                              ]
                          },
                          {
                              name: 'What\'s in it for you',
                              groupId: 4,
                              values: [
                                  {
                                      value: '',
                                      error: null
                                  }
                              ]
                          },
                          {
                              name: 'Responsibilities',
                              groupId: 5,
                              values: [
                                  {
                                      value: '',
                                      error: null
                                  }
                              ]
                          },
                      ]
                  }
              );
          },
          removeVacancy: function (vacancy) {
              if(isNaN(vacancy.id))
              {
                  this.vacancies.splice(this.vacancies.indexOf(vacancy), 1)
              } else {
                  if(vacancy.hasOwnProperty('destroy'))
                      vacancy.destroy = true;
                  else
                      Vue.set(vacancy, 'destroy', true);
              }
           },
      }
    })
}


</script>

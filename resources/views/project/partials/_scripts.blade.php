<script type="text/x-template" id="option-template">
    <div>
        <div class="form-group" v-for="(opt,j) in op">
            <label class="col-sm-4 control-label">@{{ opt.name }}</label>
            <div class="col-sm-6">
              <template v-for="(vv,i) in opt.values">
                  <input
                    type="text"
                    :name="'vacancies[' + index + '][' + i + '][]'"
                    class="form-control"
                    v-model="vv.value">
                    <br>
              </template>
            </div>
            <div class="col-sm-2">
                <div @click="addField(j)" style="color: #f76533; text-decoration:underline; cursor:pointer">Plus</div>
                <div @click="removeField(j)" style="color: #f00; text-decoration:underline; cursor:pointer">Del.</div>
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
          removeField: function(index){
              if(this.op[index].values.length > 1)
                  this.op[index].values.pop();
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
                  id: '',
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
            if(member.id == false)
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
                      id: '',
                      name: '',
                      info: '',
                      total: '',
                      free: '',
                      error: [],
                      options: [
                          {
                              name: 'Essential Skills',
                              values: [
                                  {value: '', error: null}
                              ]
                          },
                          {
                              name: 'Personal Skills',
                              values: [
                                  {value: '', error: null}
                              ]
                          },
                          {
                              name: 'Would be good plus',
                              values: [
                                  {value: '', error: null}
                              ]
                          },
                          {
                              name: 'What\'s in it for you',
                              values: [
                                  {value: '', error: null}
                              ]
                          },
                          {
                              name: 'Responsibilities',
                              values: [
                                  {value: '', error: null}
                              ]
                          },
                      ]
                  }
              );
          },
          removeVacancy: function (vacancy) {
              if(vacancy.id == false)
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

<script type="text/x-template" id="option-template">
    <div>
        <div class="form-group" v-for="(opt,j) in op">
            <label class="col-sm-4 control-label"> @{{opt.name}} </label>
            <div class="col-sm-6">
                <div class="container-fluid">
                    <div class="row">
                      
                        <template v-for="(vv,i) in opt.subList.values"> 
                            <div class="col-sm-10" v-bind:class="{ hidden: vv.destroy  }">
                             <label class="col-sm-4 control-label"> </label> 
                             <input
                                  type="text"
                                  :name="'vacancies[' + index + '][options][' + opt.groupId + '][' + i + '][id]'"
                                  class="hidden"
                                  v-model="vv.id">

                              <input
                                type="text"
                                :name="'vacancies[' + index + '][options][' + opt.groupId + '][' + i + '][destroy]'"
                                class="hidden"
                                v-model="vv.destroy">
                                <input
                                  type="text"
                                  :name="'vacancies[' + index + '][options][' + opt.groupId + '][' + i + '][value]'"
                                  class="form-control"
                                  v-model="vv.value">
                                  <div class="alert alert-danger" role="alert" v-for="k in vv.error"> @{{ k }} </div>
                                  <br>
                            </div>
                            <div class="col-sm-2" v-bind:class="{ hidden: vv.destroy  }">
                                <div class="btn btn-danger" @click="removeField(vv, j)" style="color: white; cursor:pointer">Del.</div>
                            </div>
                      </template>
                  </div>
              </div>
            </div>
            <div class="col-sm-2">
                <div class="btn btn-success" @click="addField(j)" style="color: white; cursor:pointer">Plus</div>
            </div>
            <hr>
        </div>
    </div>
</script>

<script type="text/javascript">

window.onload = function(){
    $('body').on('change', '.inputImg',function (e) {
        e.stopPropagation();
        var t = this;
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function imageIsLoaded(e) {
                    var prevContainer = t.closest('.form-group');
                    $(prevContainer).find('.prevImg').attr('src', e.target.result);
                };
            reader.readAsDataURL(this.files[0]);
        }
    });

    Vue.component('listoption', {
      props: ['op', 'index'],
      template: '#option-template',
      methods: {
          addField: function(index){
              this.op[index].subList.values.push({
                  value: '',
                  error: null
              });
          },
          removeField: function(option, index){
              if(isNaN(option.id))
              {
                  var v = this.op[index].subList.values;
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
        members: JSON.parse('{!! json_encode($root["subList"]["members"], JSON_HEX_APOS | JSON_HEX_QUOT) !!}'),
        vacancies: JSON.parse('{!! json_encode($root["subList"]["vacancies"], JSON_HEX_APOS | JSON_HEX_QUOT) !!}'),
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
                      subList: {
                          options: [
                              {
                                  name: 'Essentialskills' ,
                                  groupId: 1,
                                  subList: {
                                      values: [
                                              { value: '', error: null }
                                          ]
                                    }
                              },
                              {
                                  name: 'Personalskills',
                                  groupId: 2,
                                  subList: {
                                      values: [
                                              { value: '', error: null }
                                          ]
                                    }
                              },
                              {
                                  name: 'Would be good plus',
                                  groupId: 3,
                                  subList: {
                                      values: [
                                              { value: '', error: null }
                                          ]
                                    }
                              },
                              {
                                  name: 'Whats in it for you',
                                  groupId: 4,
                                  subList: {
                                      values: [
                                              { value: '', error: null }
                                          ]
                                    }
                              },
                              {
                                  name: 'Responsibilities',
                                  groupId: 5,
                                  subList: {
                                      values: [
                                              { value: '', error: null }
                                          ]
                                    }
                              },
                          ]
                      }
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

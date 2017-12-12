<script type="text/x-template" id="option-template">
    <div>
        <div class="form-group" v-for="opt in op">
            <label class="col-sm-4 control-label">@{{ opt.name }}</label>
            <div class="col-sm-8">
              <template v-for="vv in opt.values">
                  <input
                    type="text"
                    name=""
                    class="form-control"
                    v-model="vv.value">
                    <span class="help-block">error message</span>
              </template>
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
      props: ['op'],
      template: '#option-template'
    })

    var app = new Vue({

      el: '#app',

      data: {
        members: [
            {
                name: 'Jack',
                position: 'CEO',
                avatarSrc: 'image.png',
                error: {
                    name: null,
                    position: 'Need a graduation',
                    avatarSrc: null,
                }
            },
            {
                name: 'Gregor',
                position: 'Layer',
                avatarSrc: 'face.png',
                error: {
                    name: null,
                    position: null,
                    avatarSrc: 'be cooler',
                }
            },
        ],
        vacancies: [
            {
                name:  { value: 'Vacancy Name', error: null},
                info:  { value: 'Description', error: null},
                total: { value: 7, error: null},
                free:  { value: 4, error: null},
                options: [
                    {
                        name: 'Essential Skills',
                        values: [
                            {value: 'essential skills 1', error: null},
                            {value: 'essential skills 2', error: null},
                            {value: 'essential skills 3', error: null},
                        ]
                    },
                    {
                        name: 'Personal Skills',
                        values: [
                            {value: 'personal skills skills 1', error: null},
                            {value: 'personal skills skills 2', error: null},
                            {value: 'personal skills skills 3', error: null},
                        ]
                    },
                    {
                        name: 'Would be good plus',
                        values: [
                            {value: 'would be good plus 1', error: null},
                            {value: 'would be good plus 2', error: null},
                            {value: 'would be good plus 3', error: null},
                        ]
                    },
                    {
                        name: 'What\'s in it for you',
                        values: [
                            {value: 'for yous skills 1', error: null},
                            {value: 'for yous skills 2', error: null},
                            {value: 'pfor youls skills 3', error: null},
                        ]
                    },
                    {
                        name: 'Responsibilities',
                        values: [
                            {value: 'responsibilitiesls 1', error: null},
                            {value: 'responsibilitiess 2', error: null},
                            {value: 'responsibilitiess 3', error: null},
                        ]
                    },
                ]
            }
        ]
      },

      watch: {
        // currentBranch: 'fetchData'
      },

      methods: {
        addMember: function () {
          this.members.push(
              {
                  name: '',
                  position: '',
                  avatarSrc: 'default.png',
                  error: {
                      name: null,
                      position: null,
                      avatarSrc: null,
                  }
              });
          },
          addVacancy: function(){
              this.vacancies.push(
                  {
                      name:  { value: '', error: null},
                      info:  { value: '', error: null},
                      total: { value: '', error: null},
                      free:  { value: '', error: null},
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
          }
      }
    })
}


</script>

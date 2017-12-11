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
          }
      }
    })
}


</script>

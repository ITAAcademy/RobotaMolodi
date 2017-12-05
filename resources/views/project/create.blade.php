@extends('app')
@section('headLinks')
    <link href="{{ asset('/css/test/project.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/vue"></script>
@endsection
@section('content')
<h1 class="text-center">{{ trans('project.addProject')}} </h1>
<div class="container">
    <div class="row">
        <div class="col-xs-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($project, array('route' => array('project.store'), 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

                    @include('project.partials.form._description')
                    @include('project.partials.form._team')

                {!! Form::submit(trans('project.send'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>


<script>
var app4 = new Vue({
    el: '#form_members',

     data () {
     	return {
         members: [{
         	avatar: '',
         	name: '',
           position: '',
         }]
       };
     },

     methods: {
       	addRow: function(e) {
        e.preventDefault();
       	this.members.push({
           name: '',
           position: '',
         });
       },


       delRow: function(e) {
           e.preventDefault();
       	this.members.pop();
       },

       pushFields: function(e)
   		{
            e.preventDefault();
            console.log(JSON.stringify(this.members));
        },
        onFileChange(index)
        {
             this.members[index].avatar = event.target.files[0]
        }
     }
})


Vue.component('input-label', {
  template: '<label>З диску</label>'
})

Vue.component('input-file', {
  template: '<input class="form-control" type="file">'
})

Vue.component('input-text', {
  template: '<input class="form-control" type="text">'
})

function loadImage(el){
    $(el).trigger('click');
}
</script>
@endsection

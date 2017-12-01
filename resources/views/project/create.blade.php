@extends('app')
@section('headLinks')
    <link href="{{ asset('/css/test/project.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/vue"></script>
@endsection
@section('content')
<h1 class="text-center">{{ trans('project.addProject')}} </h1>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($project, array('route' => array('project.store'), 'enctype' => 'multipart/form-data')) !!}

                    @include('project.partials.form._description')


                    <p class="text-center">Команда проекту</p>
                    <div id="form_members">
                        <div class="form-group" v-for="(member,index) in members">
                            <label>Фото</label>
                             <input type="file" :name="'members[' + index + '][avatar]'" @change="onFileChange(index)">
                             <label>Імя та прізвище</label>
                             <input type="text" :name="'members[' + index + '][name]'" class="form-control" v-model="member.name">
                             <label>Посада</label>
                             <input type="text" :name="'members[' + index + '][position]'" class="form-control" v-model="member.position">
                            <hr>
                        </div>

                        <a href="#"  class="controlMember" @click="addRow"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>Додати члена команди</a>
                        <a href="#"  class="controlMember" @click="delRow">Видалити зі списку</a>

                    </div>

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
</script>
@endsection

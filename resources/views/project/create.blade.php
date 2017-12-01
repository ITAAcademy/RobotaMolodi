@extends('app')
@section('headLinks')
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


                    <p>Add Members</p>
                    <div id="app">
                        <div class="form-group" v-for="(member,index) in members">
                             <input type="file" :name="'members[' + index + '][avatar]'" @change="onFileChange(index)">
                             <input type="text" :name="'members[' + index + '][name]'" class="form-control" v-model="member.name">
                             <input type="text" :name="'members[' + index + '][position]'" class="form-control" v-model="member.position">
                            <hr>
                        </div>

                        <div>
                            <a href="#"  class="orangeLinks" @click="addRow"><i class="fa fa-plus fa-2x" aria-hidden="true"></i>Додати члена команди</a>
                        </div>
                        <div>
                            <a href="#"  class="orangeLinks" @click="delRow">Видалити зі списку</a>
                        </div>

                    </div>

                {!! Form::submit(trans('project.send'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>


<script>
var app4 = new Vue({
    el: '#app',

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

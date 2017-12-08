<p class="text-center">Вакансії на проект</p>
<div class="form-group">
    {!! Form::label('', 'Введіть назву вакансії', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[0][name]"
            class="form-control"
            value="{{old('vacancies.0.name')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('', 'Essential Skills', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[0][essential_skills][]"
            class="form-control"
            value="{{old('vacancies.0.essential_skills.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][essential_skills][]"
            class="form-control"
            value="{{old('vacancies.0.essential_skills.1')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][essential_skills][]"
            class="form-control"
            value="{{old('vacancies.0.essential_skills.2')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Personal Skills', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[0][personal_skills][]"
            class="form-control"
            value="{{old('vacancies.0.personal_skills.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][personal_skills][]"
            class="form-control"
            value="{{old('vacancies.0.personal_skills.1')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][personal_skills][]"
            class="form-control"
            value="{{old('vacancies.0.personal_skills.2')}}">
        <br>
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Would be a good plus', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[0][be_plus][]"
            class="form-control"
            value="{{old('vacancies.0.be_plus.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][be_plus][]"
            class="form-control"
            value="{{old('vacancies.0.be_plus.1')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Whats in it for you', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[0][for_you][]"
            class="form-control"
            value="{{old('vacancies.0.for_you.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][for_you][]"
            class="form-control"
            value="{{old('vacancies.0.for_you.1')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Resbonsibilities', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[0][responsibilities][]"
            class="form-control"
            value="{{old('vacancies.0.responsibilities.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][responsibilities][]"
            class="form-control"
            value="{{old('vacancies.0.responsibilities.1')}}">
        <br>
        <input
            type="text"
            name="vacancies[0][responsibilities][]"
            class="form-control"
            value="{{old('vacancies.0.responsibilities.2')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Опис вакансії', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
      <input
        type="text"
        name="vacancies[0][description]"
        class="form-control"
        value="{{old('vacancies.0.description')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Кількість вакансій', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-4">
      <input
        type="text"
        name="vacancies[0][total]"
        class="form-control"
        value="{{old('vacancies.0.total')}}">
    </div>
    <div class="col-sm-4">
      <input
        type="text"
        name="vacancies[0][free]"
        class="form-control"
        value="{{old('vacancies.0.free')}}">
    </div>
</div>

<hr>
<br>
<hr>

<div class="form-group">
    {!! Form::label('', 'Введіть назву вакансії', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[1][name]"
            class="form-control"
            value="{{old('vacancies.1.name')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('', 'Essential Skills', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[1][essential_skills][]"
            class="form-control"
            value="{{old('vacancies.1.essential_skills.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][essential_skills][]"
            class="form-control"
            value="{{old('vacancies.1.essential_skills.1')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][essential_skills][]"
            class="form-control"
            value="{{old('vacancies.1.essential_skills.2')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Personal Skills', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[1][personal_skills][]"
            class="form-control"
            value="{{old('vacancies.1.personal_skills.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][personal_skills][]"
            class="form-control"
            value="{{old('vacancies.1.personal_skills.1')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][personal_skills][]"
            class="form-control"
            value="{{old('vacancies.1.personal_skills.2')}}">
        <br>
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Would be a good plus', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[1][be_plus][]"
            class="form-control"
            value="{{old('vacancies.1.be_plus.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][be_plus][]"
            class="form-control"
            value="{{old('vacancies.1.be_plus.1')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Whats in it for you', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[1][for_you][]"
            class="form-control"
            value="{{old('vacancies.1.for_you.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][for_you][]"
            class="form-control"
            value="{{old('vacancies.1.for_you.1')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Resbonsibilities', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="vacancies[1][responsibilities][]"
            class="form-control"
            value="{{old('vacancies.1.responsibilities.0')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][responsibilities][]"
            class="form-control"
            value="{{old('vacancies.1.responsibilities.1')}}">
        <br>
        <input
            type="text"
            name="vacancies[1][responsibilities][]"
            class="form-control"
            value="{{old('vacancies.1.responsibilities.2')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Опис вакансії', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
      <input
        type="text"
        name="vacancies[1][description]"
        class="form-control"
        value="{{old('vacancies.1.description')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Кількість вакансій', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-4">
      <input
        type="text"
        name="vacancies[1][total]"
        class="form-control"
        value="{{old('vacancies.1.total')}}">
    </div>
    <div class="col-sm-4">
      <input
        type="text"
        name="vacancies[1][free]"
        class="form-control"
        value="{{old('vacancies.1.free')}}">
    </div>
</div>

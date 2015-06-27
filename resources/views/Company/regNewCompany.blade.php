@extends ('NewVacancy/layout')

@section('contents')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <form method="POST" accept-charset="UTF-8"><input name="_token" type="hidden" value="DRJVy4F4cETSZOHq9PL0KpcDlpbHW2j6x3lnzXCf">
        <div class="form-group" >
            <label for="sector" class="col-sm-2 control-label">Назва компаніїї</label>
            <div class="col-sm-5">
                <input class="form-control"  name="companyName" type="text" >
            </div>
            <div ><span>*</span> поле обовязкове для заповнення</div>
            </br>
        </div>

        <div class="form-group" style="margin-top: 20px">
            <label for="level" class="col-sm-2 control-label">Електронна пошта компанії</label>
            <div class="col-sm-5">
                <input class="form-control" name="companyEmail" type="text">
                <input class="btn btn-primary" type="submit" value="Зареєструвати компанію" onclick="ohg()">
            </div>
            </br>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

            <!--<input name="_token" type="hidden" value="DRJVy4F4cETSZOHq9PL0KpcDlpbHW2j6x3lnzXCf">-->
        </div>
    </form>

@endsection


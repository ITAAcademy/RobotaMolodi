@extends('app')

@section('content')
     <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!--Form filters-->
    {!! Form::open(['method' => 'get',  'class'=>'form-inline']) !!} <!-- F-->
        <select name="industry" class="form-control" id="selectIndustry" style="width: 200px">
            <option value="0"> Усі галузі</option>
            @foreach($industries as $industry)
                <option value="{{$industry->id}}"> {{$industry->name}} </option>
            @endforeach
        </select>

        <select name="city" class="form-control" id="selectCity">
            <option value="0"> Усі міста</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}"> {{$city->name}} </option>
            @endforeach
        </select>

        <div class="form-group">
            <!--{!! Form::submit('Пошук', ['class'=>'btn btn-primary']) !!}-->
        </div>

    {!!Form::close()!!}

    <!-- Output vacancies  -->

    <div class="list-group" id="resDiv">
        @foreach($vacancies as $vacancy)
            <a href="vacancy/{{$vacancy->id}}" class="list-group-item">
                <p>
                    <h3 class="list-group-item-heading">{{$vacancy->id}} Позиція: <span class="text-info" >{{$vacancy->position}}</span>
                    <span class="text-muted text-right pull-right"><h5>{{$vacancy->created_at}}</h5></span></h3>
                <h4 class="list-group-item-heading">Опис вакансії: <span class="text-success">{{ substr($vacancy->description, 0, 100)}}</span>...</h4>
                </p>
                <p class="list-group-item-text"><b>Зарплата: </b> {{$vacancy->salary}} </p>

            </a>
        @endforeach
        <?php echo $vacancies->render(); ?>
    </div>
@stop

<script type="text/javascript" src="js/jquery-1.11.3.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#get').click(function(e)
        {
            e.preventDefault();
            $.get('categories',function(data)
            {
                console.log(data);
            });
        });

    });

    $(document).ready(function(){
        $('#selectIndustry').change(function(){
            $("div.list-group").empty();
            var city_id = $('[name=city]').val();
            var industry_id = $('[name=industry]').val();

            alert(industry_id);
            alert(city_id);
            $.ajax({   //start of ajax
                url: "filterVacancy",
                type:"POST",
                beforeSend: function(xhr){
                    var token = $('meta[name="csrf_token"]').attr('content');
                    if (token)
                    {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {'city_id' : city_id, 'industry_id' : industry_id},
                success:function(json){

                    if(json.length < 1){
                        $('div[class=list-group]').html('<p class="btn bg-danger">По даному  запросу дані відсутні.</p>');
                    }
                     if(json) {

                        var vacancies = JSON.parse(json['vacancies']);
                        for(var i in vacancies.data)
                        {

                            ////////////////////////////////////////////////////////////////////////////////////////////
                            var vacancy = '<a href="vacancy/'+vacancies.data[i].id +'" class="list-group-item">';
                                vacancy += '<p>';
                                vacancy += '<h3 class="list-group-item-heading">'+vacancies.data[i].branch +' Позиція: <span class="text-info" >'+vacancies.data[i].position +'</span>';
                                vacancy += '<span class="text-muted text-right pull-right"><h5>'+vacancies.data[i].created_at+'</h5></span></h3>';
                                vacancy += '<h4 class="list-group-item-heading">Опис вакансії: <span class="text-success">'+ vacancies.data[i].description+'</span>...</h4>';
                                vacancy += '</p>';
                                vacancy += '<p class="list-group-item-text"><b>Зарплата: </b>'+ vacancies.data[i].salary+ '</p>';
                                vacancy += '</a>';

                            $('#resDiv').append(vacancy);




                  //////////////////////////////////////////////////////////////////////////////////////////////////////////
//                            jQuery('<div/>', {
//                                id: vacancies.data[i].id,
//                                href: 'vacancy/'+ vacancies.data[i].id,
//                                title: vacancies.data[i].position,
//                                text: vacancies.data[i].description
//                            }).appendTo('#resDiv');
                        }
                            $('#resDiv').append(vacancies.total);
                        }

                },
                error:function(){
                    alert("error!!!!");
                }
            }); //end of ajax
        });
    });

</script>
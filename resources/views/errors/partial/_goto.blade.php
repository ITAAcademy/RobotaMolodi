<div class="btn-group">
    @include('errors.partial._button',['type' =>'btn-primary','url' => '/','caption'=> 'Перейти на головну сторінкy'])

    @if (Auth::check())
        @include('errors.partial._button',['type' =>'btn-success','url' => '/cabinet','caption'=> 'Перейти до особистого кабінету'])
    @endif
</div>
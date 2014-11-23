@include('header')

<div class="container main-container">
    <div class="row">
        <div class="col-xs-12"><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif
            @if (Session::get('message') != '')
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif

            <h1>{{Auth::getUser()->hemocenter->name}} - Módulo Recepção</h1>

            @if (Donation::where('queue', 1)->count() > 0)
                <h3>Há {{Donation::where('queue', 1)->count()}} doadores aguardando</h3>
            @else
                <h3>Não há doadores aguardando</h3>
            @endif

            <br><br><a href="{{url('reception/call')}}" class="btn btn-lg btn-primary">Chamar doador</a>
        </div>
    </div>
</div>

@include('footer')
@include('header')

<div class="container main-container">
    <div class="row">
        <div class="col-xs-12"><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            <h1>{{Auth::getUser()->hemocenter->name}} - Módulo Recepção</h1>
            <h3>Identificação do doador <span class="label label-primary">senha #{{$donation->id}}</span></h3>

            <br><br>

            <div class="row">
                <div class="col-sm-4">
                    {{Form::open()}}
                        <input type="text" name="donator_info" class="form-control" placeholder="Nome ou CPF do doador" autofocus="">
                        <input type="submit" class="btn btn btn-primary" value="Buscar doador"/>
                    {{Form::close()}}
                </div>
            </div>

            <br><br>

            <div class="row">
                <div class="col-sm-4">
                    @if (isset($donators))
                        @if (count($donators) > 0)
                            <table class="table table-bordered">
                                @foreach ($donators as $donator)
                                    <tr>
                                        <td>{{$donator->name}}</td>
                                        <td><a class="btn btn-primary btn-xs" href="{{url('/reception/' . $donation->id . '/link/' . $donator->id)}}">Escolher doador</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            Nenhum doador encontrado. <br>
                            <a href="{{url('/reception/' . $donation->id . '/registration')}}" class="btn btn-sm btn-primary">Cadastrar doador</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
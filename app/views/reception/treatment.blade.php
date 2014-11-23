@include('header')

<div class="container main-container">
    <div class="row">
        <div class="col-xs-12"><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            <h1>{{Auth::getUser()->hemocenter->name}} - Módulo Recepção</h1>
            <h3>Confirmação de dados do doador <span class="label label-primary">senha #{{$donation->id}}</span></h3>

            <br><br>

            <div class="row">
                <div class="col-sm-4">
                    {{Form::open()}}
                    
                        <label>Nome</label>
                        <input value="{{$donation->donator->name}}" type="text" name="name" class="form-control" placeholder="Nome do doador" autofocus=""><br>
                    
                        <label>RG</label>
                        <input value="{{$donation->donator->rg}}" type="text" name="rg" class="form-control" placeholder="RG do doador" autofocus=""><br>
                    
                        <label>CPF</label>
                        <input value="{{$donation->donator->cpf}}" type="text" name="cpf" class="form-control" placeholder="CPF do doador" autofocus=""><br>

                        <label>Nome da mãe</label>
                        <input value="{{$donation->donator->mother_name}}" type="text" name="mother_name" class="form-control" placeholder="Nome da mãe do doador" autofocus=""><br>

                        <label>Endereço</label>
                        <input value="{{$donation->donator->address}}" type="text" name="address" class="form-control" placeholder="Endereço do doador" autofocus=""><br>

                        <label>Bairro</label>
                        <input value="{{$donation->donator->district}}" type="text" name="district" class="form-control" placeholder="Bairro do doador" autofocus=""><br>

                        <label>Cidade</label>
                        <input value="{{$donation->donator->city}}" type="text" name="city" class="form-control" placeholder="Cidade do doador" autofocus=""><br>

                        <label>Estado</label>
                        <input value="{{$donation->donator->state}}" type="text" name="state" class="form-control" placeholder="Estado do doador" autofocus=""><br>

                        <br><input type="submit" class="btn btn btn-default" value="Salvar dados do doador"/>

                        <br><br><a href="{{url('/reception/' . $donation->id . '/finalization')}}" class="btn btn-lg btn-primary">Finalizar recepção</a>
                        <br><br>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
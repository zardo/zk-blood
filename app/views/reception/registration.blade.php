@include('header')

<div class="container main-container">
    <div class="row">
        <div class="col-xs-12"><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            <h1>{{Auth::getUser()->hemocenter->name}} - Módulo Recepção</h1>
            <h3>Cadastro do doador <span class="label label-primary">senha #{{$donation->id}}</span></h3>

            <br><br>

            <div class="row">
                <div class="col-sm-4">
                    {{Form::open()}}
                    
                        <label>Nome</label>
                        <input type="text" name="name" class="form-control" placeholder="Nome do doador" required autofocus=""><br>
                    
                        <label>RG</label>
                        <input type="text" name="rg" class="form-control" placeholder="RG do doador" required autofocus=""><br>
                    
                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control" placeholder="CPF do doador" required autofocus=""><br>

                        <label>Nome da mãe</label>
                        <input type="text" name="mother_name" class="form-control" placeholder="Nome da mãe do doador" required autofocus=""><br>

                        <label>Endereço</label>
                        <input type="text" name="address" class="form-control" placeholder="Endereço do doador" required autofocus=""><br>

                        <label>Bairro</label>
                        <input type="text" name="district" class="form-control" placeholder="Bairro do doador" required autofocus=""><br>

                        <label>Cidade</label>
                        <input type="text" name="city" class="form-control" placeholder="Cidade do doador" required autofocus=""><br>

                        <label>Estado</label>
                        <input type="text" name="state" class="form-control" placeholder="Estado do doador" required autofocus=""><br>

                        <br><input type="submit" class="btn btn btn-primary" value="Cadastrar doador"/><br><br><br><br>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
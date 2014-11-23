@include('header')

<div class="container main-container">
    <div class="row">
        <div class="col-xs-12"><br><br>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            @endif

            <h1>{{Auth::getUser()->hemocenter->name}} - Módulo Triagem</h1>
            <h3>Questionário de triagem <span class="label label-primary">senha #{{$donation->id}}</span> <span class="label label-info">{{$donation->donator->name}}</span></h3>

            <br><br>

            <div class="row">
                <div class="col-sm-4">
                    {{Form::open()}}
                    
                        <label>Fez sexo com mais de 3 parceiros nos últimos 12 meses?</label><br>
                        <label><input type="radio" name="sex_with_more_than_3_partners" value="1" required>Sim</label>
                        <label><input type="radio" name="sex_with_more_than_3_partners" value="0" required>Não</label><br><br>
                    
                        <label>Usa substâncias químicas?</label><br>
                        <label><input type="radio" name="used_drugs" value="1" required>Sim</label>
                        <label><input type="radio" name="used_drugs" value="0" required>Não</label><br><br>
                    
                        <label>Já fez cirurgia?</label><br>
                        <label><input type="radio" name="had_surgery" value="1" required>Sim</label>
                        <label><input type="radio" name="had_surgery" value="0" required>Não</label><br>

                        <br><input type="submit" class="btn btn-lg btn-primary" value="Salvar dados da pré-triagem"/>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
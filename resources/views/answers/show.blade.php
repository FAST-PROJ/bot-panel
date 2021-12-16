@extends('layouts.AdminLTE.index')

@section('icon_page', 'question-circle')

@section('title', $answer->question)

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-2">
                        <h4><b>Pergunta: </b></h4>
                        <span>{{ $answer->question }}</span>
                        <br><br>
                        <h4><b>Acurácia: </b></h4>
                        <span>{{ $answer->score }}</span>
                    </div>
                    <div class="col-lg-8">
                        <div class="attachment">
                            <h4><b>Resposta: </b></h4>
                            <span>{{ $answer->answer }}</span>
                            <br><br>
                            <p class="help-block"><i class="fa fa-clock-o"></i> Data Criação: {{$answer->created_at->format('d/m/Y H:i') }}</p>
                            <p class="help-block"><i class="fa fa-refresh"></i> Última atualização: {{$answer->updated_at->format('d/m/Y H:i') }}</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
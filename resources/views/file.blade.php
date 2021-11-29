@extends('layouts.AdminLTE.index')

@section('icon_page', 'file')

@section('title', 'Adicionar Arquivos')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="post">

            <div class="file-upload">
                <button
                    class="file-upload-btn"
                    type="button">
                    Adicionar Arquivo
                </button>

                <div class="file-upload-wrap">
                    <input class="file-upload-input" type='file' name="arquivo" accept="application/pdf,application/vnd.ms-excel" />
                    <div class="drag-text">
                        <h3>Arraste e solte um arquivo ou clique em Adicionar arquivo</h3>
                    </div>
                </div>
                <div class="file-upload-content">
                    <div class="file-title-wrap">
                        <button
                            type="button"
                            class="remove-file">Remover <span class="file-title">Arquivo adicionado</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Salvar Arquivo</button>
            </div>
        </form>
    </div>
@endsection

<link rel="stylesheet" href="{{ mix('css/uploader.css') }}">
@extends('layouts.AdminLTE.index')

@section('icon_page', 'file')

@section('title', 'Adicioanr Arquivos')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->get('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="post">
                            <div class="form-group {{ $errors->has('arquivo') ? 'has-error' : '' }}">
                                <label>Arquivo</label>
                                <input type="file"  class="form-control-file" name="arquivo">
                                @if($errors->has('arquivo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('arquivo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group text-right">
                               <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Salvar Arquivo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


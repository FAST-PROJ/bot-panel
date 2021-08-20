@extends('layouts.AdminLTE.index')

@section('icon_page', 'android')

@section('title', 'Bot Professor Virtual')

@section('page_menu')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="chatbot-container">
                        <div class="chatbot-content" id="app">
                            <botman-tinker api-endpoint="/botman"></botman-tinker>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .chatbot-container {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
    }

    .chatbot-content {
        text-align: center;
    }

    #app {
        position: absolute;
        bottom: 10px;
    }

    .ChatAttachment + label, input.ChatInput {
        height: 35px !important;
        border-radius: 10px;
        border: 1px solid !important;
        border-color: #3c8dbc !important;
        padding: 5px 10px 4px 10px !important;
    }

    .chatbot-container {
        height: 75vh !important;
    }
</style>
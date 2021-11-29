@extends('layouts.AdminLTE.index')

@section('icon_page', 'android')

@section('title', 'Bot Professor Virtual')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="chatbot-container">
                <div class="chatbot-content" id="chat-app">
                    <botman-tinker api-endpoint="/botman"></botman-tinker>
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

    #chat-app {
        position: absolute;
        bottom: 20px;
        width: 100%;
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

    .ChatLog {
        height: 70vh;
        overflow-y: auto;
        max-width: 100% !important;
    }
</style>
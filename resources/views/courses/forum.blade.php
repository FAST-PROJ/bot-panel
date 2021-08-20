<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Fórum</h3>
    </div>
    <div class="box-body chat" id="chat-box">

        @foreach ($content as $message)
            <div class="item">
                <img src="{{ asset('assets/adminlte/dist/img/user3-128x128.jpg') }}" alt="user image"
                    class="offline">

                <p class="message">
                    <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> {{ $message['datetime'] }}</small>
                        {{ $message['user'] }}
                    </a>
                    {{ $message['title'] }}
                    <a href="#" style="float: right">Responder</a>
                </p>
            </div>
        @endforeach

    </div>
    <div class="box-footer">
        <div class="input-group">
            <input class="form-control" placeholder="Faça uma pergunta no fórum...">

            <div class="input-group-btn">
                <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
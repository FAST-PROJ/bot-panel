<div class="box box-primary">
    <div class="box-header">
        <i class="fa fa-book"></i>
        <h3 class="box-title">
            Meus Cursos em Andamento
        </h3>
    </div>

    <div class="box-body">
        <div class="row">
            @foreach ($content as $lesson)
                <div class="col-md-12 col-sm-12 col-12">
                    <div class="info-box bg-{{ $lesson['category_color'] }}">
                        <span class="info-box-icon"><i class="{{ $lesson['icon'] }}"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">{{ $lesson['name'] }}</span>
                            <span class="info-box-number">
                                Aula Atual: {{ $lesson['current_lesson'] }} - <small class="label"><i class="fa fa-clock-o"></i> {{ $lesson['current_time_left'] }}</small>

                            </span>
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ $lesson['progress'] }}%"></div>
                            </div>
                            <span class="progress-description">
                                <small class="label">Progresso: {{ $lesson['progress'] }}%</small>
                                <small class="label">Para finalizar o curso: <i class="fa fa-clock-o"></i> {{ $lesson['time_left'] }}</small>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
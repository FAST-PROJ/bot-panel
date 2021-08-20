<div class="box box-primary">
    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Novidades</h3>
    </div>
    <div class="box-body">
        <ul class="todo-list">
            @foreach ($content as $new)
                <li>
                    <span class="text">{{ $new['name'] }}</span>
                    <small class="label label-info"> {{ $new['type'] }}</small>
                    <small class="label label-primary"><i class="fa fa-clock-o"></i> {{ $new['time_left'] }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</div>

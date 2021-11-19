@extends('layouts.AdminLTE.index')

@section('icon_page', 'user')

@section('title', 'Users')

@section('content')

    <div class="box box-primary">
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table id="tabelapadrao" class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th>Pergunta</th>
									<th>Resposta</th>
									<th class="text-center">Data Criação</th>
									<th class="text-center">Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach($answers as $answer)
                                    <tr>
                                        <td>{{ $answer->question }}</td>
                                        <td>{{ $answer->answer }}</td>
                                        <td class="text-center">{{ $answer->created_at->format('d/m/Y H:i') }}</td>

                                        <td class="text-center">
                                            <a
                                                class="btn btn-default btn-xs"
                                                href="{{ route('user.answers.show', $answer->id) }}"
                                                title="See {{ $answer->question }}">
                                                    <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@include('layouts.AdminLTE._includes._data_tables')
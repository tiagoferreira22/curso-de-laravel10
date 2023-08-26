<h1>Lista das Duvidas</h1>

<a href="{{ route('support.create') }}">Nova dúvida</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @if($supports->isEmpty())
            <tr>
                <td colspan="4">Nem um dado a ser exibido</td>
            </tr>
        @endif
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->content }}</td>
                <td>
                    <a href="{{ route('support.show', $support->id) }}">Ir</a>
                    <a href="{{ route('support.edit', $support->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

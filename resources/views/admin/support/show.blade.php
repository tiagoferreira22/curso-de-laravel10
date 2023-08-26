<h1>Detalhe da Dúvida {{ $support->id }}</h1>

<ul>
    <li>{{ $support->subject }}</li>
    <li>{{ $support->status }}</li>
    <li>{{ $support->content }}</li>
</ul>

<form action="{{ route('support.destroy', $support->id) }}" method="POST">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>

<h1>Nova Dúvida</h1>

@if($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('support.store') }}" method="POST">
    @csrf()
    <input type="text" placeholder="Assunto" name="subject" value="{{ old('subject') }}">
    <textarea name="content" cols="30" rows="5" placeholder="Descrição">{{ old('content') }}</textarea>
    <button type="submit">Enviar</button>
</form>

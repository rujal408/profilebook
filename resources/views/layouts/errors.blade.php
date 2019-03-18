@if (count($errors) > 0)

    <ul>
        @foreach ($errors->all() as $error)
            <li style="list-style: none;">{{ $error }}</li>
        @endforeach
    </ul>

@endif

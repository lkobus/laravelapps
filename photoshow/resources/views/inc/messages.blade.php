@if(count($errors) > 0)
    @foreach($errors->all() as $e)
        <div class="callout alert">
            {{$e}}
        </div>
    @endforeach
@endif


@if(session('success'))
    <div class="callout success">
        {{session('success')}}
    </div>
@endif
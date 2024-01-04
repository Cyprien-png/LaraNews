<label for="">title</label>
<input name="title" id="title" value="{{$article->title}}">
@error('title')
    <div class="alert alert-danger">{{ $message }}</div> @endif

<label for="">body</label>
<textarea name="body" id="body">{{$article->body}}</textarea>
@error('body')
    <div class="alert alert-danger">{{ $message }}</div> @endif

{{-- manage errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $errors)
                <li>{{$errors}}</li>
            @endforeach
        </ul>
    </div>
@endif

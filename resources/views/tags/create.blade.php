@if(isset($newTags))
    @foreach ($newTags as $tag)
        <span class="badge rounded-pill bg-secondary">{{ $tag }}</span>
    @endforeach
@endif

<script>
        TODO SHOW TAGS
</script>

<div class="">
    <strong>Create Tags:</strong>
    <input id="new-tag"/>
    <button id="create-tag">Add tag</button>
</div>


<script>
    document.getElementById("create-tag").onclick = function (e) {
        e.preventDefault()

        newTags = document.getElementById("new-tag").value
        console.log(tag);
    }
</script>

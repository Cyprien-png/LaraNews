<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">

<script>
    $(document).ready(function() {
        $('#multiple-checkboxes').multiselect({
            includeSelectAllOption: true,
        });
    });
</script>

<div class="">
    <strong>Choose tags:</strong>
    <select name="tags[]" id="multiple-checkboxes" multiple="multiple">
        @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select>
</div>



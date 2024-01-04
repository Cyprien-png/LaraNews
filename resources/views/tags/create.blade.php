@if(isset($newTags))
@foreach ($newTags as $tag)
<span class="badge rounded-pill bg-secondary">{{ $tag }}</span>
@endforeach
@endif

<link rel="stylesheet" type="text/css" href="{{ url('/app.css') }}" />


<select style="display:none;" name="newTags[]" id="newTags" multiple></select>

<div id="tag-container"></div>

<div class="">
    <strong>Create Tags:</strong>
    <input id="new-tag" />
    <button id="create-tag">Add tag</button>
</div>


<script>
    let newTags = []

    document.getElementById("create-tag").onclick = function (e) {
        e.preventDefault()

        let tagValue = document.getElementById("new-tag").value

        if (tagValue.trim() !== "") {
            if (!newTags.includes(tagValue)) {
                newTags.push(tagValue)

                let newOption = document.createElement("option")
                newOption.value = tagValue
                newOption.text = tagValue
                newOption.selected = true

                document.getElementById("newTags").appendChild(newOption)
            }
        }
        document.getElementById("new-tag").value = ''
        console.log(newTags)

        updateTags()
    }

    function updateTags() {
        let tagContainer = document.getElementById("tag-container")
        tagContainer.innerHTML = ''

        newTags.forEach(tag => {
            let newSpan = document.createElement("span")
            newSpan.textContent = tag
            newSpan.classList.add("badge", "rounded-pill", "bg-secondary", "removable")

            newSpan.addEventListener('click', function () {
                let index = newTags.indexOf(tag)
                if (index > -1) {
                    newTags.splice(index, 1)
                    updateTags()
                    updateSelectOptions()
                }
            });

            tagContainer.appendChild(newSpan)
        });
    }

    function updateSelectOptions() {
        let selectElement = document.getElementById("newTags")
        selectElement.innerHTML = ''

        newTags.forEach(tag => {
            let newOption = document.createElement("option")
            newOption.value = tag
            newOption.text = tag
            newOption.selected = true
            selectElement.appendChild(newOption)
        });
    }

    updateTags()
</script>
$(() => {
    ClassicEditor.create(document.querySelector("#description"), {
        // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    })
        .then((editor) => {
            window.editor = editor;
        })
        .catch((err) => {
            console.error(err.stack);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show-image').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image-input").change(function() {
        readURL(this);
    });
});
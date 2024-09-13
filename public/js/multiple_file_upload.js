document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('imgupload');
    const files = [];

    input.addEventListener('change', function (event) {
        const selectedFiles = Array.from(event.target.files);
        selectedFiles.forEach(file => {
            files.push(file);
        });
    });

    document.getElementById('createForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const formData = new FormData();
        const name = document.getElementById('name').value;
        const content = $('#summernote').code();

        formData.append('name', name);
        formData.append('content', content);

        files.forEach((file, index) => {
            formData.append('imgupload[]', file);
        });

        // Submit form
        fetch('{{ route('pages.store') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-Token': window.csrfToken,
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

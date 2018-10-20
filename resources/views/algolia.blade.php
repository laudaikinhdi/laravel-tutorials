<!DOCTYPE html>
<html>
<head>
    <title>Algolia Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <h1>Algolia Search</h1>
        <input type="text" id="search" class="form-control" list="browsers" name="browser">
        <datalist id="browsers"></datalist>
    </div>
    <script>
        $(document).ready(function() {
            var client = algoliasearch('SBIKP3F61K', '6265dd0e1cd771e356450825263646d5');
            var index = client.initIndex('users_index')

            $('body').on('keyup', '#search', function(event) {
                event.preventDefault();
                // $.ajaxSetup({
                //     headers: {
                //         "X-CSRF-TOKEN": $('[name=csrf-token]').attr('content')
                //     }
                // })

                // $.ajax({
                //     url: '/algolia',
                //     type: 'POST',
                //     data: {q: $('#search').val()},
                // })
                // .done(function(data) {
                //     console.log(data);
                //     $('#browsers').html('')
                //     data.forEach(el => {
                //         $('#browsers').append(`<option value="${el.name}">`)
                //     })
                // })
                index.search({
                    query: $(this).val(),
                    hitsPerPage: 10,
                },
                function searchDone(err, content) {
                    if (err) throw err;
                    content.hits.forEach(el => {
                        $('#browsers').append(`<option value="${el.name}">`)
                    })
                });
            });
        });
    </script>
</body>
</html>

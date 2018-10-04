<!DOCTYPE html>
<html>
<head>
    <title>Ajax Tutorials</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<form method="post" action="ajax">
    @csrf
    <input type="text" name="website">
    <button id="submit" type="submit">Submit</button>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
        //     }
        // });

        $('#submit').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: '/ajax',
                type: 'post',
                data: $('form').serialize(),
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        });
    });
</script>
</body>
</html>

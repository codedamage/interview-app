<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP interview questions -  @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/r4fqe6vzwcrscrcv7d2l5scqq8l4yz77l9hpb48e2dga56cu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
@include('parts.header')
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
        toolbar_mode: 'floating',
    });
</script>
<script type="text/javascript">

    Dropzone.autoDiscover = false;

    var dropzone = new Dropzone('#image-upload', {
        thumbnailWidth: 200,
        maxFilesize: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif"
    });

</script>
</body>
</html>

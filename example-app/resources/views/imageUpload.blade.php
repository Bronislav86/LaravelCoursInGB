<html>
<head>
    <title>Image upload</title>
    <meta name="csrf-token" content={{csrf_token()}}>
</head>
<body>
    <form name="image-upload" enctype="multipart/form-data" method='post' action="{{Route('uploadImage')}}">
        <input type='file' value="Image to upload" name="uploadImage[]">
        <input type='file' value="Image to upload" name="uploadImage[]">
        <input type='file' value="Image to upload" name="uploadImage[]">
        <input type='submit' value='Send'>
        @csrf
    </form>
</body>
</html>

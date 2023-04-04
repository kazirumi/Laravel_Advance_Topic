<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Form</title>
</head>
<body>
<form>
        //Pipeline example
    <table>

        <tbody>
        @foreach($posts as $post)
            <tr>
                <td><li><?=$post->id ?> </li></td>
                <td><?=$post->title ?></td>
            </tr>
        @endforeach
        </tbody>

    </table>
{{$posts->appends(request()->input())->links('pagination::bootstrap-4')}}

</form>
</body>
</html>

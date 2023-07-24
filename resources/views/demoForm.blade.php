<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('demo') }}" method="POST">
        @csrf
        <input type="text" name="uid" placeholder="uid">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="district" placeholder="district">
        <input type="text" name="division" placeholder="division">
        <input type="text" name="level" placeholder="level">
        <input type="text" name="semester" placeholder="semester">
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html style="width: 100%">
<head>
    <title>Sham Com</title>
</head>
<body style="width: 100%">
    <div style="width: 100%;margin: 20px;padding: 10px 30px;text-align: center">
        <h1>Your visa is Ready - {{ $visa->client->name }} {{ $visa->client->family_name }}</h1>
        <p style="padding: 5px;width: 80%;margin: auto">Thank you Apply through <a href="{{ route('home', app()->getLocale()) }}">Sham Com</a></p>
    </div>

</body>
</html>
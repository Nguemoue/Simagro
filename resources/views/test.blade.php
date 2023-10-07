<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="{{asset('logo.jpg')}}" type="image/x-icon">
    <title>Document</title>
    <button id="button">quitter</button>
</head>
<body>
<h1>test de echo</h1>
@vite(['resources/js/app.js'])
<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
<script>
  const beamsClient = new PusherPushNotifications.Client({
    instanceId: '20aea73f-2cc3-4161-9c6c-bcd99d927f1f',
  });

  beamsClient.start()
    .then(() => beamsClient.addDeviceInterest('hello'))
    .then(() => console.log('Successfully registered and subscribed!'))
    .catch(console.error);
</script>
</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <title>Message de contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f7f7f7;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #E2D239;
            /* La couleur que nous avons utilisée précédemment */
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .email-title {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Vous avez reçu un nouveau message de {{ $name }}</h1>
        <p class="email-title">Email:</p>
        <p>{{ $email }}</p>
        <p class="email-title">Message:</p>
        <p>{{ $content }}</p>
    </div>
</body>

</html>

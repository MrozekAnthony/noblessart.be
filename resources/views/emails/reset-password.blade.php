<!DOCTYPE html>
<html>

<head>
    <title>Nouveau mot de passe sur Noblessart</title>
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
            /* Or any other color you'd prefer */
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .password {
            background-color: #E2D239;
            /* Same color as the title for emphasis */
            padding: 10px;
            border-radius: 5px;
            font-size: 18px;
            color: #333;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }

        .signature {
            font-style: italic;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nouveau mot de passe sur Noblessart</h1>
        <p>Bonjour,</p>
        <p>Nous avons réinitialisé votre mot de passe comme vous l'avez demandé. Voici votre nouveau mot de passe:</p>

        <div class="password">{{ $plainPassword }}</div>

        <p>Nous vous recommandons de vous connecter dès maintenant et de modifier ce mot de passe pour quelque chose de
            plus personnel et sécurisé.</p>
        <p>Si vous n'avez pas demandé à réinitialiser votre mot de passe, veuillez contacter notre support
            immédiatement.</p>

        <p>Bonne création,</p>
        <p class="signature">L'équipe Noblessart</p>
    </div>
</body>

</html>

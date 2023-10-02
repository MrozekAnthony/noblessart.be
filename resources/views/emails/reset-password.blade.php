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
        <h1>Veuillez de pas répondre à ce mail !</h1>
        <p>Bonjour cher utilisateur,</p>
        <p>Tu as demandé de changer de mot de passe. Voici un code tout frais, tout beau :</p>

        <div class="password">{{ $plainPassword }}</div>

        <p>Tu as quelques minutes pour l’utiliser et changer ton mot de passe afin de sécuriser ton compte ? Pour plus
            de sécurité, nous te recommandons un mot de passe composés de minuscules, majuscules, chiffres et caractères
            spéciaux.</p>
        <p>Ce n’était pas toi ? Informe alors le support au <a
                href="mailto:contact@noblessart.be">contact@noblessart.be</a> sans plus attendre. Nous ferons tout
            pour te répondre au plus vite.</p>

        <p>Bonne création,</p>
        <p class="signature">Ta chère <i>NoblessArt</i>.</p>
    </div>
</body>

</html>

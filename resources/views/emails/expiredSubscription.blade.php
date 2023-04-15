<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>EVENTSKECH - Bienvenue</title>
    <style>
        /* Email styles */
        body {
          font-family: Arial, sans-serif;
          font-size: 16px;
          line-height: 1.4;
          margin: 0;
          padding: 0;
        }
        p {
          margin: 1em 0;
        }
        /* Container */
        .container {
          max-width: 600px;
          margin: 0 auto;
          padding: 0 20px;
          border: 1px solid #CCCCCC;
          border-radius: 10px;
        }
        /* Header */
        .header {
          padding: 20px;
          text-align: center;
        }
        .header h1 {
            color: #FA86C4 !important;
          margin: 0;
        }
        /* Body */
        .body {
          padding: 20px;
        }
        /* Footer */
        .footer {
          padding: 20px;
          text-align: center;
          font-size: 12px;
          color: #777777;
        }
      </style>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <h1 ><span style="color: #212121 !important;">EVENTS</span>KECH</h1>
      </div>
      <div class="body">
        <h2>Bien cher(e) {{ $data['nom'] }} {{ $data['prenom'] }} !</h2>
        <br><br>
        @foreach ($data['content'] as $item)
            <p>{{$item}}</p>
        @endforeach
        <p>Nous vous remercions à nouveau de votre confiance et espérons avoir de vos nouvelles prochainement.</p>
        <p>Cordialement</p>
      </div>
      <div class="footer">
        <p>Cet email a été envoyé automatiquement. Merci de ne pas répondre.</p>
      </div>
    </div>
  </body>
</html>

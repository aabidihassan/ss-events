<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>EVENTSKECH - Bienvenue</title>
    <style>
        /* Email styles */
        body {
          font-family: Arial, sans-serif;
          font-size: 14px;
          line-height: 1.4;
          color: #444444;
          margin: 0;
          padding: 0;
        }
        h1, h2, h3, h4, h5, h6 {
          color: #000000;
          font-weight: 600;
          line-height: 1.2;
          margin: 0;
        }
        p {
          margin: 1em 0;
        }
        a {
          color: #EE5F3F;
          text-decoration: none;
        }
        a:hover {
          text-decoration: underline;
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
          background-color: #F3F3F3;
          padding: 20px;
          text-align: center;
        }
        .header h1 {
          font-size: 24px;
          margin: 0;
        }
        /* Body */
        .body {
          background-color: #FFFFFF;
          padding: 20px;
        }
        /* Footer */
        .footer {
          background-color: #F3F3F3;
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
        <h1>EVENTSKECH</h1>
      </div>
      <div class="body">
        <h2>Bienvenue sur EVENTSKECH, {{ $data['nom'] }} {{ $data['prenom'] }} !</h2>
        @if (is_array($data['content']))
          @if (isset($data['content']['username']))
          <p>Votre username :<strong> {{$data['content']['username']}} </strong></p>
          <p>Votre mots de passe : <strong> {{$data['content']['password']}}</strong></p>
          @else
              <h2>Votre abonnement a été renouvelé avec succès</h2>
          @endif
        <p>Votre service : {{$data['content']['service']}} </p>
        <p>Votre Type d'abonnement : {{$data['content']['abonnement']['typeAbonnemant']  }} </p>
        <p>Date d'activation l'abonnement : {{$data['content']['abonnement']['start_date']}} </p>
        <p>La date à laquelle l'abonnement a été expédié : {{$data['content']['abonnement']['end_date']}} </p>
        <p>Prix  : {{$data['content']['abonnement']['prix']}} (MAD)</p>
        @else
        <h3>{{$data['content']}}</h3>
        @endif
        <p>Merci d'avoir rejoint EVENTSKECH, la plateforme de référence pour trouver et organiser des événements en Maroc. Nous sommes ravis de vous compter parmi nos utilisateurs.</p>
        <p>Vous pouvez dès à présent explorer les événements à venir, ajouter des événements à votre liste de favoris, et recevoir des recommandations personnalisées en fonction de vos préférences.</p>
        <p>N'hésitez pas à nous contacter si vous avez des questions ou des commentaires.</p>
        <p>A très bientôt sur EVENTSKECH !</p>
      </div>
      <div class="footer">
        <p>Cet email a été envoyé automatiquement. Merci de ne pas répondre.</p>
      </div>
    </div>
  </body>
</html>

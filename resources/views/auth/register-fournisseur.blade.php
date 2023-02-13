@extends('layouts.pages')
@section('title', 'Prestataire')
@section('containner')

<style>
  .card {
    min-width: 300px;
    height: auto;
    overflow: hidden;
    border-radius: 15px;
    margin: 0 auto;
    padding: 40px 20px;
    box-shadow: 0 10px 15px rgba(0,0,0,0.3);
    transition: .5s;
  }
  .card:hover {
    transform:scale(1.1);
  }
  .card_red, .card_red .title .fa {
    background: linear-gradient(-45deg, #ffec61, #f321d7);
  }
  .card_violet, .card_violet .title .fa  {
    background: linear-gradient(-45deg, #f403d1, #64b5f6);
  }
  .card_three, .card_three .title .fa  {
    background: linear-gradient(-45deg, #24ff72, #9a4eff);
  }

  .card:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 40%;
    background: rgba(255, 255, 255, .1);
    z-index: 1;
    transform: skewY(-5deg) scale(1.5);
  }

  .title .fa {
    color: #fff;
    font-size: 60px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    text-align: center;
    line-height: 100px;
    box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
  }
  .title h2 {
    position: relative;
    margin: 20px 0 0;
    padding: 0;
    color: #fff;
    font-size: 28px;
    z-index: 2;
  }
  .price {
    position: relative;
    z-index: 2;
  }
  .price h4 {
    margin: 0;
    padding: 20px 0;
    color: #fff;
    font-size: 60px;
  }
  .option {
    position: relative;
    z-index: 2;
  }
  .option ul {
    margin: 0;
    padding: 0;
  }
  .option ul li {
    margin: 0 0 10px;
    padding: 0;
    list-style: none;
    color: #fff;
    font-size: 16px;
  }
  .card a {
    display: block;
    position: relative;
    z-index: 2;
    background-color: #fff;
    color: #262ff;
    width: 150px;
    height: 40px;
    text-align: center;
    margin: 20px auto 0;
    line-height: 40px;
    border-radius: 40px;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
  box-shadow: 0 5px 10px rgba(0,0,0, .1);
  }

</style> 

    <div class="wrapper">
        <div class="container">
            <div class="row">

                <h1 class="text-center">Améliorez votre présence en ligne !</h1>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="../../img/visibility.png" />
                        <div class="card-body">
                            <h5>Augmentez votre visibilité</h5>
                            <p>Vous présentez dans votre vitrine tous vous offres et services d'une manière attractive et
                                persuasive</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="../../img/demande.png" />
                        <div class="card-body">
                            <h5>Recevez plus de demandes de prestations</h5>
                            <p>On va vous aider à attirer plus de prestations et vous mettre au coeur de notre priorité</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="../../img/client.png" />
                        <div class="card-body">
                            <h5>Obtenez plus de clients</h5>
                            <p>Vous développez votre activité en obtenant plus de nouveaux clients intéressées par votre
                                prestations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Start -->
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Mega Offer</h6>
                        <h1 class="text-white"><span class="text-primary">30% OFF</span> For Honeymoon</h1>
                    </div>
                    <p class="text-white">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                        ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet diam</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Etsea et sit dolor amet ipsum</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum vero.</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Sign Up Now</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Your name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" placeholder="Your email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Select a destination</option>
                                        <option value="1">destination 1</option>
                                        <option value="2">destination 1</option>
                                        <option value="3">destination 1</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit">Sign Up Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

<section>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card card_red text-center">
            <div class="title">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>
              <h2>Basic</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i>10 GB Space</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>3 Domain Names</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>20 Emails Addresse</li>
                <li><i class="fa fa-times" aria-hidden="true"></i>Live Support</li>
                </ul>
            </div>
            <a href="#">Order Now</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card card_violet text-center">
            <div class="title">
              <i class="fa fa-plane" aria-hidden="true"></i>
              <h2>Premium</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i>10 GB Space</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>3 Domain Names</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>20 Emails Addresse</li>
                <li><i class="fa fa-times" aria-hidden="true"></i>Live Support</li>
                </ul>
            </div>
            <a href="#">Order Now</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card card_three text-center">
            <div class="title">
              <i class="fa fa-rocket" aria-hidden="true"></i>
              <h2>Standart</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>50</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i>50 GB Space</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>5 Domain Names</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>20 Emails Addresse</li>
                <li><i class="fa fa-times" aria-hidden="true"></i>Live Support</li>
                </ul>
            </div>
            <a href="#">Order Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@stop

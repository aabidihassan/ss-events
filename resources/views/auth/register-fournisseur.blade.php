@extends('layouts.pages')
@section('title', 'Prestataire')
@section('containner')

<style>
  .card {

    overflow: hidden;
    border-radius: 15px;
    margin: 0 auto;
    padding: 20px 20px;
    box-shadow: 0 10px 15px rgba(0,0,0,0.3);
    transition: .5s;
  }

</style>

    <div class="wrapper">
        <div class="container">
        <h2 class="text-center">Améliorez votre présence en ligne !</h2>

            <div class="row mt-5">

                <div class="col-md-4 ">
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

        <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
         <h2 class="text-center">Quels sont nos services ?</h2>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Augmentez votre portée</h5>
                            <p class="m-0">Augmenter votre visibilité en ligne et toucher un public plus large.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Gagnez en crédibilité</h5>
                            <p class="m-0">Bénéficier d'un système de notation et d'avis sur votre plateforme.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Gagnez du temps</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Économisez de l'argent</h5>
                            <p class="m-0">Économiser de l'argent en évitant les coûts de publicité traditionnels</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
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
                    <div class="card" style="background-color: rgba(0,0,0,.7)">
                        <div class="text-center">
                        <h2 class="card-title pt-2 text-white">
                          <strong>Accès prestataire</strong>
                        </h2>
                        </div>
                            <div>
                                <button class="btn btn-primary btn-block py-3">Inscrivez-vous</button>
                            </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->


<!-- <div class="container">
  <div class="row">
  <div class="col-4">
      <div class="card text-center mb-4">
        <div class="card-body">
          <h2 class="text-primary">1 Mois</h2>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor tincidunt.</p>
           <ul class="list-group list-group-flush">
            <li class="list-group-item">Feature 1</li>
            <li class="list-group-item">Feature 2</li>
            <li class="list-group-item">Feature 3</li>
          </ul>
          <div class="card-footer bg-transparent border-primary">
            <h4 class="text-primary">1500 DH</h4>
            <a href="#" class="btn btn-primary">Profiter</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card text-center mb-4">
        <div class="card-body">
          <h2 class="text-primary">3 Mois</h2>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor tincidunt.</p>

          <div class="card-footer bg-transparent border-primary">
            <h4 class="text-primary">4000 DH</h4>
            <a href="#" class="btn btn-primary">Profiter</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card text-center mb-4">
        <div class="card-body">
          <h2 class="text-primary">6 Mois</h2>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor tincidunt.</p>

          <div class="card-footer bg-transparent border-primary">
            <h4 class="text-primary">7000 DH</h4>
            <a href="#" class="btn btn-primary">Profiter</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->





<style>



.pricingTable {
    text-align: center;
    background: #fff;
    margin: 0 10px;
    box-shadow: 0 0 10px #ababab;
    padding-bottom: 40px;
    border-radius: 10px;
    color: #cad0de;
    transform: scale(1);
    transition: all .5s ease 0s
}

.pricingTable:hover {
    transform: scale(1.05);
    z-index: 1
}

.pricingTable .pricingTable-header {
    padding: 40px 0;
    background: #f5f6f9;
    border-radius: 10px 10px 50% 50%;
    transition: all .5s ease 0s
}

.pricingTable:hover .pricingTable-header {
    background: #ff9624
}

.pricingTable .pricingTable-header i {
    font-size: 50px;
    color: #858c9a;
    margin-bottom: 10px;
    transition: all .5s ease 0s
}

.pricingTable .price-value {
    font-size: 35px;
    color: #ff9624;
    transition: all .5s ease 0s
}

.pricingTable .month {
    display: block;
    font-size: 14px;
    color: #cad0de
}

.pricingTable:hover .month,
.pricingTable:hover .price-value,
.pricingTable:hover .pricingTable-header i {
    color: #fff
}

.pricingTable .heading {
    font-size: 24px;
    color: #ff9624;
    margin-bottom: 20px;
    text-transform: uppercase
}

.pricingTable .pricing-content ul {
    list-style: none;
    padding: 0;
    margin-bottom: 30px
}

.pricingTable .pricing-content ul li {
    line-height: 30px;
    color: #a7a8aa
}

.pricingTable .pricingTable-signup a {
    display: inline-block;
    font-size: 15px;
    color: #fff;
    padding: 10px 35px;
    border-radius: 20px;
    background: #ffa442;
    text-transform: uppercase;
    transition: all .3s ease 0s
}

.pricingTable .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #ffa442
}

.pricingTable.blue .heading,
.pricingTable.blue .price-value {
    color: #4b64ff
}

.pricingTable.blue .pricingTable-signup a,
.pricingTable.blue:hover .pricingTable-header {
    background: #4b64ff
}

.pricingTable.blue .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #4b64ff
}

.pricingTable.red .heading,
.pricingTable.red .price-value {
    color: #ff4b4b
}

.pricingTable.red .pricingTable-signup a,
.pricingTable.red:hover .pricingTable-header {
    background: #ff4b4b
}

.pricingTable.red .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #ff4b4b
}

.pricingTable.green .heading,
.pricingTable.green .price-value {
    color: #40c952
}

.pricingTable.green .pricingTable-signup a,
.pricingTable.green:hover .pricingTable-header {
    background: #40c952
}

.pricingTable.green .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #40c952
}

.pricingTable.blue:hover .price-value,
.pricingTable.green:hover .price-value,
.pricingTable.red:hover .price-value {
    color: #fff
}

@media screen and (max-width:990px) {
    .pricingTable {
        margin: 0 0 20px
    }
}</style>

<div class="demo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <div class="price-value"> $10.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Standard</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Monthly Bandwidth</li>
                            <li><b>10</b> subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="#">sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable green">
                    <div class="pricingTable-header">
                        <div class="price-value"> $20.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Business</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>60GB</b> Disk Space</li>
                            <li><b>60</b> Email Accounts</li>
                            <li><b>60GB</b> Monthly Bandwidth</li>
                            <li><b>15</b> subdomains</li>
                            <li><b>20</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="#">sign up</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable blue">
                    <div class="pricingTable-header">
                        <div class="price-value"> $30.00 <span class="month">per month</span> </div>
                    </div>
                    <h3 class="heading">Premium</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><b>70GB</b> Disk Space</li>
                            <li><b>70</b> Email Accounts</li>
                            <li><b>70GB</b> Monthly Bandwidth</li>
                            <li><b>20</b> subdomains</li>
                            <li><b>25</b> Domains</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="#">sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop

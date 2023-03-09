@extends('backoffice.layouts.prestataire')
@section('title', 'Abonnement')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active nav-card-header" href="#votre-bonnement">Votre Abonnement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-card-header" href="#historique-abonnement">Historique Abonnement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-card-header" href="#activer-abonnement">Activer Abonnement</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="content-body-card" id="votre-bonnement">
                <div class="row">
                    <div class="col-md-6">
                      <h3>Subscription Status:</h3>
                      <p>
                        Your monthly subscription is currently <span class="text-success"><i class="fas fa-check-circle"></i> Active</span>.
                      </p>
                    </div>
                    <div class="col-md-6">
                      <h3>Payment Information:</h3>
                      <p>
                        Payment method: <i class="fab fa-cc-visa"></i> Visa ending in 1234
                      </p>
                      <p>
                        Next payment due: <span class="text-primary"><i class="far fa-calendar-check"></i> March 15, 2023</span>
                      </p>
                    </div>
                </div>
            </div>
            <div class="content-body-card" id="historique-abonnement" style="display: none;">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Type Abonnement</th>
                                <th>Date d'ctivation</th>
                                <th>Date d'expiration</th>
                                <th>État d'abonnement</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0 ; $i < 10 ; $i++)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="content-body-card" id="activer-abonnement" style="display: none;">
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
    </div>
@stop

@section('script')
<script>
    $(document).ready(function() {
        $('.nav-card-header').click(function(e) {
            e.preventDefault();
            $('.nav-card-header').removeClass('active');
            $(this).addClass('active');
            var target = $(this).attr('href');
            $('.content-body-card').hide();
            $(target).show();
        });
    });
</script>
@endsection


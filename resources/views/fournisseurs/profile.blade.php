@extends('layouts.pages')
@section('containner')
@section('title', 'Profile')


<div class="container mt-4">
    <div class="card p-3 main-body">
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">les informations sont bien enregistrées!</div>
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('fournisseurs/' . session('profile')->photo) }}" alt="Admin"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4 class="mb-1">{{ session('profile')->nom }} {{ session('profile')->prenom }} </h4>
                                <h4 class="mb-3">{{ session('profile')->raison }}</h4>
                                <p class="text-muted font-size-sm">{{ session('profile')->telephone }} |
                                    {{ session('profile')->telephone2 }}</p>
                                <p class="text-muted font-size-sm">{{ session('profile')->email }} |
                                    {{ session('profile')->email2 }}</p>
                                <p class="text-muted font-size-sm">Nombre de vues : {{ session('profile')->vues }}</p>
                                <!-- <button class="btn btn-primary">Follow</button>
         <button class="btn btn-outline-primary">Message</button> -->
                            </div>

                        </div>
                        <!-- <hr class="my-4">
       <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
         <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
         <span class="text-secondary">https://bootdey.com</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
         <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
         <span class="text-secondary">bootdey</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
         <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
         <span class="text-secondary">@bootdey</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
         <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
         <span class="text-secondary">bootdey</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
         <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
         <span class="text-secondary">bootdey</span>
        </li>
       </ul> -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('editCompte') }}">
                            @csrf
                            <h5 class="text-center">Informations de compte</h5>
                            <div class="d-flex flex-column mt-4">
                                <div class="col text-secondary">
                                    <h6>Nom d'utilisateur</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="text" class="form-control" name="username"
                                        value="{{ auth()->user()->username }}">
                                </div>
                                <div class="col text-secondary mt-4">
                                    <h6>Nouveau mot de passe</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="password" class="form-control" name="password"
                                        autocomplete="new-password">
                                </div>
                                <div class="col text-secondary">
                                    <input type="submit" class="btn btn-primary px-4 mt-4" value="Modifier">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="POST" action="{{ route('editProfile') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Reseaux sociaux</h5>
                            <div class="d-flex flex-column mt-4">
                                <div class="col text-secondary">
                                    <h6><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook me-2 icon-inline" style="color:blue;">
                                            <path
                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="text" class="form-control" placeholder="Lien Facebook"
                                        name="fb" value="{{ session('profile')->fb }}">
                                </div>
                                <div class="col text-secondary mt-4">
                                    <h6><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-whatsapp mr-2" style="color:green;"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                        </svg>Whatsapp</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="text" class="form-control" name="whatsapp"
                                        placeholder="Lien WhatsApp" value="{{ session('profile')->whatsapp }}">
                                </div>
                                <div class="col text-secondary mt-4">
                                    <h6><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram me-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20"
                                                rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5">
                                            </line>
                                        </svg>Instagram</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="text" class="form-control" name="insta"
                                        placeholder="Lien Instagram" value="{{ session('profile')->insta }}">
                                </div>
                                <div class="col text-secondary mt-4">
                                    <h6><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter me-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>Twitter</h6>
                                </div>
                                <div class="col text-secondary">
                                    <input type="text" class="form-control" name="twitter"
                                        placeholder="Lien Twitter" value="{{ session('profile')->twitter }}">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Informations personnels</h5>
                        <div class="row mb-3 mt-4">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="nom"
                                    value="{{ session('profile')->nom }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Prenom</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="prenom"
                                    value="{{ session('profile')->prenom }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="email"
                                    value="{{ session('profile')->email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Telephone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="telephone"
                                    value="{{ session('profile')->telephone }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Informations publique</h5>
                        <div class="row mb-3 mt-4">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Raison</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="raison" placeholder="Raison"
                                    value="{{ session('profile')->raison }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="email2" placeholder="E-Mail"
                                    value="{{ session('profile')->email2 }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Telephone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" placeholder="Telephone" name="telephone2"
                                    value="{{ session('profile')->telephone2 }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Ville</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select name="citie" class="form-control" id="dropdown">
                                    <option disabled selected>Choisir une ville</option>
                                    @foreach($cities as $citie)
                                    <option value="{{ $citie->name }}" {{ session('profile')->citie == $citie->name ? 'selected' : '' }}>{{ $citie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Service</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <select name="service" class="form-control" id="dropdown">
                                    <option disabled selected>Choisir un service</option>
                                    @foreach($services as $service)
                                    <option value="{{ $service->libelle }}" {{ session('profile')->service == $service->libelle ? 'selected' : '' }}>{{ $service->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea class="form-control py-3 px-4" rows="2" name="adresse" id="adresse" placeholder="Adresse"
                                    data-validation-required-message="Veuillez entrer votre adresse">{{ session('profile')->adresse }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Description</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea class="form-control py-3 px-4" rows="6" name="description" id="description"
                                    placeholder="Description" data-validation-required-message="Veuillez entrer votre adresse">{{ session('profile')->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card align-items-center text-center">
                    <h5 class="text-center mt-4">Galerie</h5>
                    <div class="card-body row" id="mydiv">
                        @foreach (File::allFiles(public_path('fournisseurs/' . auth()->user()->id . '/')) as $file)
                            <div class="card p-1" style="width: 14rem;">
                                <img class="card-img-top"
                                    src="{{ asset('fournisseurs/' . auth()->user()->id . '/' . $file->getFilename()) }}"
                                    style="height: 200px;">
                                <button type="button" class="btn btn-primary mt-1 ml-3 mr-3 set-profile-picture"
                                    style="font-size : 10px;" data-image="{{ $file->getFilename() }}">Choisir photo
                                    de profile</button>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-body row">
                        <div class="row mb-3">
                            <div class="col-sm-9 text-secondary">
                                <input type="file" class="form-control" placeholder="Choisir une photo"
                                    accept="image/*" id="image-input">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" id="submit-image" class="btn btn-primary">Ajouter la
                                    photo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
      <div class="col-sm-12">
       <div class="card">
        <div class="card-body">
         <h5 class="d-flex align-items-center mb-3">Project Status</h5>
         <p>Web Design</p>
         <div class="progress mb-3" style="height: 5px">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
         <p>Website Markup</p>
         <div class="progress mb-3" style="height: 5px">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
         <p>One Page</p>
         <div class="progress mb-3" style="height: 5px">
          <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
         <p>Mobile Template</p>
         <div class="progress mb-3" style="height: 5px">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
         <p>Backend API</p>
         <div class="progress" style="height: 5px">
          <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
         </div>
        </div>
       </div>
      </div>
     </div> -->
            </div>
        </div>
        <div class="row text-secondary m-1 mt-3">
            <input type="submit" class="btn btn-primary" value="Modifier les informations">
        </div>
        </form>
    </div>
</div>

@stop

@section('script')
<script>
    $(document).ready(function() {
        $('#submit-image').click(function() {
            let image = $('#image-input')[0].files[0];
            let formData = new FormData();
            formData.append('image', image);

            $.ajax({
                url: "{{ route('image.store') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('.set-profile-picture').click(function() {
            var image = $(this).data('image');
            $.ajax({
                url: "{{ route('profile_picture.update') }}",
                type: 'POST',
                data: {
                    image: image
                },
                success: function(result) {
                    location.reload();
                },
                error: function(error) {
                    alert("Erreur")
                }
            });
        });
    });
</script>
@endsection
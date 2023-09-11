<x-guest-stistla>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="{{asset('logo.jpg')}}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Creation d'un compte</h4></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                            @csrf

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="frist_name">First Name</label>
                                        <input id="frist_name" required type="text" class="form-control" name="nom" autofocus>
                                        <div class="invalid-feedback">{{__('validation.required', ['attribute' => 'nom'])}}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" type="text" class="form-control" name="prenom">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" required type="email" class="form-control" name="email">
                                    <div class="invalid-feedback">{{__('validation.required', ['attribute' => 'Email'])}}</div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password"  type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                        <div class="invalid-feedback">{{__('validation.required', ['attribute' => 'password'])}}</div>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2"  class="d-block">Password Confirmation</label>
                                        <input id="password2"  required type="password" class="form-control" name="password_confirmation">
                                        <div class="invalid-feedback">{{__('validation.required', ['attribute' => 'Confirmation password'])}}</div>
                                    </div>
                                </div>

                                <div class="form-divider">
                                    Addresse
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Country</label>
                                        <select class="form-control selectric" name="pays">
                                            <option>Cameroun</option>
                                            <option>Gabon</option>
                                            <option>Nigeria</option>
                                            <option>Tchad</option>
                                            <option>Cote d'ivoire</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Type de compte</label>
                                        <select class="form-control selectric" name="type_compte">
                                            <option>Entreprise</option>
                                            <option>Personnel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="ville" required>
                                        <div class="invalid-feedback">{{__('validation.required', ['attribute' => 'city'])}}</div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control" name="bp">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" class="custom-control-input" required id="agree">
                                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-stistla>
@push("scripts")
    <script>
        $(".pwstrength").pwstrength();
    </script>
@endpush

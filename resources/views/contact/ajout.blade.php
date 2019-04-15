@extends('layouts.layout')

@section('content')
    <div class="title">
       Ajouter un Contact
    </div>

    <div class="container">
        <form method="post" action="{{route('contact.store')}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="block">
                                <div class="champs"> Identité du Contact</div>
                                <div class="Souschamps"><small>civilité</small></div>
                                <div style="margin-bottom: 10px">
                                    <select name="civility" class="browser-default custom-select">
                                        <option value="Madame">Madame</option>
                                        <option value="Monsieur">Monsieur</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="Souschamps"><small>Prénom</small></label>
                                        <input type="text" class="form-control" id="prenom" name="last_name" {{ $errors->has('last_name') ? ' is-invalid' : '' }}>
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->get('last_name')[0] }}</strong>
                                            </span>
                                        @endif
                                        <label class="Souschamps"><small>Fonction</small></label>
                                        <input type="text" class="form-control" id="fonction" name="fonction" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="Souschamps"><small>Nom</small></label>
                                        <input type="text" class="form-control" id="nom" name="name" {{$errors->has('name') ? ' is-invalid' : '' }}>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->get('name')[0] }}</strong>
                                            </span>
                                        @endif
                                        <label class="Souschamps"><small>Service</small></label>
                                        <input type="text" class="form-control" id="service" name="service" >
                                    </div>
                                </div>

                                <label class="Souschamps"><small>Email</small></label>
                                <div class="input-container">
                                    <input type="email"  style="color: #1f6fb2" class=" form-control" id="email" name="email" {{ $errors->has('email') ? ' is-invalid' : '' }}>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->get('email')[0] }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-ms-3" style="margin-left:13px;margin-right: 15px">
                                        <label class="Souschamps"><small>Télephone mobile</small></label>
                                        <input type="text" style="width: 126px;" class="form-control" id="phone_number" name="phone_number">
                                    </div>
                                    <div class="col-ms-3">
                                        <label class="Souschamps"><small>Date de naissance </small></label>
                                        <input type="text" style="width: 115px;" class="form-control datepicker" id="date_of_birth" name="date_of_birth" >
                                    </div>
                                </div>
                                <div  style="margin-top:15px;" >
                                    <select name="society_id" class="browser-default custom-select">
                                        <option value="-1"> Liste des sociétés </option>
                                        @foreach( $societies as $societie)
                                            {
                                                <option value="{{$societie->id}}">{{$societie->name}}</option>
                                            }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 10px;margin-left: 20px;margin-top: 20px">
                <button type="submit" style="color:white;" class="btn btn-info"><i class="fas fa-pencil-alt"></i>| Ajouter</button>
                <a href="{{route('contact.index')}}" class="btn" style="color:white ;background-color: #adb5bd"><i class="fas fa-th"></i> | Retour à la liste des contacts</a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $( function() {
            $( "#date_of_birth" ).datepicker();
        } );
    </script>
@endsection
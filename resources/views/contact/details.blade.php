@extends('layouts.layout')

@section('content')
    <div class="title">
       {{$contact->name}} {{$contact->last_name}} <small>contact</small>
    </div>

    <div class="container">
        <form method="post" action="{{route('contact.update',$contact->id)}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="block">
                                <div class="champs"> Identité du Contact</div>
                                <div class="Souschamps"><small>civilité</small></div>
                                <div style="margin-bottom: 10px;margin-left: 20px">
                                    <button class="btn" style="color:white ;background-color: deeppink"><i class="fas fa-female"></i>| Madame</button>
                                    <button class="btn" style="color:white ;background-color: #adb5bd"><i class="fas fa-male"></i>| Monsieur</button>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="Souschamps"><small>Prénom</small></label>
                                        <input type="text" class="form-control" id="prenom" name="name" value="{{$contact->name}}">
                                        <label class="Souschamps"><small>Fonction</small></label>
                                        <input type="text" class="form-control" id="fonction" name="fonction" value="{{$contact->fonction}}" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="Souschamps"><small>Nom</small></label>
                                        <input type="text" class="form-control" id="nom" name="last_name" value="{{$contact->last_name}}">
                                        <label class="Souschamps"><small>Service</small></label>
                                        <input type="text" class="form-control" id="service" name="service" value="{{$contact->service}}" >
                                    </div>
                                </div>

                                <label class="Souschamps"><small>Email</small></label>
                                <div class="input-container">
                                    <input type="email"  style="color: #1f6fb2" class=" form-control" id="email" name="email" value="{{$contact->email}}">
                                </div>

                                <div class="row">
                                    <div class="col-ms-3" style="margin-left:13px;margin-right: 15px">
                                        <label class="Souschamps"><small>Télephone mobile</small></label>
                                        <input type="text" style="width: 126px;" class="form-control" id="phone_number" name="phone_number" value="{{$contact->phone_number}}">
                                    </div>
                                    <div class="col-ms-3">
                                        <label class="Souschamps"><small>Date de naissance </small></label>
                                        <input type="text" style="width: 115px;" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ date('d/m/Y', strtotime($contact->date_of_birth))}}" >
                                    </div>
                                    <input type="hidden" name="society_id" value="{{$society->id}}">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block">
                                <div class="champs">Société</div>
                                <label class="Souschamps"><small>Nom</small></label>
                                <input type="text" class="form-control" id="nomSociete" name="name" value="{{$society->name}}">

                                <label class="Souschamps"><small>Adresse</small></label>
                                <textarea rows="4" class="form-control" id="adress" name="address" >{{$society->address}}</textarea>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="Souschamps"><small>code Postal</small></label>
                                        <input type="text" class="form-control" id="code" name="postal_code" value="{{$society->postal_code}}">
                                        <label class="Souschamps"><small>Téléphone</small></label>
                                        <input type="text" class="form-control" id="telephone" name="phone_number" value="{{$society->phone_number}}" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="Souschamps"><small>ville</small></label>
                                        <input type="text" class="form-control" id="ville" name="city" value="{{$society->city}}">
                                        <label class="Souschamps"><small>Site web</small></label>
                                        <input type="text" class="form-control" id="site" name="website" style="color: #1f6fb2" value="{{$society->website}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 10px;margin-left: 20px;margin-top: 20px">
                <button type="submit" style="color:white;" class="btn btn-info"><i class="fas fa-pencil-alt"></i>| Modifier</button>
                <a href="{{route('contact.index')}}" class="btn" style="color:white ;background-color: #adb5bd"><i class="fas fa-th"></i> | Retour à la liste des contacts</a>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <script>
        $( function() {
            $("#date_of_birth" ).datepicker();
        } );
    </script>
@endsection
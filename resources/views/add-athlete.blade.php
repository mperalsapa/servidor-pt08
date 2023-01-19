<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('common.bootstrap-header')
</head>
<body class="">
  @include('common.navbar')
  <div class="border-secondary border container col-3 rounded py-3 my-5">
      <h1>Afegir Atleta</h1>
        <form action="{{ Route("addAthleteAction") }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nom</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="name" aria-describedby="nameHelp" placeholder="Nom" value="{{old("name")}}">
              <small id="nameHelp" class="form-text text-muted">Nom del atleta</small>
              @error('name')
                <div class="invalid-feedback">
                {{ $errors->first("name") }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="surname" class="form-label">Cognoms</label>
              <input type="text" class="form-control {{ $errors->has('surname') ? 'is-invalid' : ''}}" name="surname" id="surname" aria-describedby="surnameHelp" placeholder="Cognoms"  value="{{old("surname")}}">
              <small id="surnameHelp" class="form-text text-muted">Cognoms</small>
              @error('surname')
                <div class="invalid-feedback">
                {{ $errors->first("surname") }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="birthdate" class="form-label">Data de naixement</label>
              <input type="date" class="form-control {{ $errors->has('birthdate') ? 'is-invalid' : ''}}" name="birthdate" id="birthdate" aria-describedby="birthdateHelp"  value="{{old("birthdate")}}">
              <small id="birthdateHelp" class="form-text text-muted">Data de naixement</small>
              @error('birthdate')
                <div class="invalid-feedback">
                {{ $errors->first("birthdate") }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="origin" class="form-label">Procedencia</label>
              <input type="text" class="form-control {{ $errors->has('origin') ? 'is-invalid' : ''}}" name="origin" id="origin" aria-describedby="helpId" placeholder="EUS"  value="{{old("origin")}}">
              <small id="helpId" class="form-text text-muted">Codi de procedencia de 3 lletres</small>
              @error('origin')
                <div class="invalid-feedback">
                {{ $errors->first("origin") }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="awards" class="form-label">Premis</label>
              <textarea class="form-control" name="awards" id="awards" rows="2"></textarea>
            </div>
            <div class="mb-3">
              <label for="deathdate" class="form-label">Data de defunció</label>
              <input type="date" class="form-control {{ $errors->has('deathdate') ? 'is-invalid' : ''}}" name="deathdate" id="deathdate" aria-describedby="deathdateHelp"  value="{{old("deathdate")}}">
              <small id="deathdateHelp" class="form-text text-muted">Data de naixement</small>
              @error('deathdate')
                  <div class="invalid-feedback">
                    {{ $errors->first('deathdate'); }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="deathreason" class="form-label">Defunció</label>
              <textarea class="form-control {{ $errors->has('deathreason') ? 'is-invalid' : ''}}" name="deathreason" id="deathreason" rows="1">{{old("deathreason")}}</textarea>
              @error('deathreason')
                  <div class="invalid-feedback">
                    {{ $errors->first('deathreason'); }}
                  </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary col-12">Enviar</button>
        </form>
    </div>
    @include('common.bootstrap-body')
</body>
</html>
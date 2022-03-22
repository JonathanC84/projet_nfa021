@csrf
<div>
    <input type="text" name="nom" id="nom" placeholder="Nom" value="{{ old('nom', $reservation->nom) }}" class="@error('nom') is-invalid @enderror form-control">
    @error('nom')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div>
    <input type="tel" name="tel" id="tel" placeholder="Téléphone" value="{{ old('tel', $reservation->tel) }}" class="@error('tel') is-invalid @enderror form-control">
    @error('tel')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div>
    <input type="date" min="{{ $now->format('Y-m-d') }}" name="date" id="date" value="{{ old('date', $reservation->date) }}" class="@error('date') is-invalid @enderror form-control">
    @error('date')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div>
    <input type="time" name="heure" id="heure" value="{{ old('heure', $reservation->heure) }}" class="@error('heure') is-invalid @enderror form-control">
    @error('heure')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div>
    <input type="number" name="couverts" id="couverts" placeholder="Nombre de couverts" value="{{ old('couverts', $reservation->couverts) }}" class="@error('couverts') is-invalid @enderror form-control">
    @error('couverts')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div>
    <textarea name="commentaires" id="commentaires" cols="30" rows="10" placeholder="Commentaires" class="@error('commentaires') is-invalid @enderror form-control">{{ old('commentaires', $reservation->commentaires) }}</textarea>
    @error('commentaires')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div>
    <input type="radio" name="confirmation" id="confirmation_null" value="null" class="form-check-input" @if (old('confirmation', $reservation->confirmation) == 'null') checked @endif>
    <label for="confirmation_null" class="@error('confirmation') is-invalid @enderror form-check-label"> En attente</label>

    <input type="radio" name="confirmation" id="confirmation_1" value="1" class="form-check-input" @if (old('confirmation', $reservation->confirmation) == '1') checked @endif>
    <label for="confirmation_1" class="@error('confirmation') is-invalid @enderror form-check-label"> Confirmer</label>

    <input type="radio" name="confirmation" id="confirmation_0" value="0" class="form-check-input" @if (old('confirmation', $reservation->confirmation) == '0') checked @endif>
    <label for="confirmation_0" class="@error('confirmation') is-invalid @enderror form-check-label"> Annuler</label>

    @error('confirmation')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
</div>
<div>
    <button type="submit" class="btn btn-primary">Valider</button>
</div>
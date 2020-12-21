@include('layouts.base')
<form class="settings" method="post" action="/game">
@csrf
    <div class="mb-3">
      <label>Nombre de joueurs</label>
      <input type="text" name="nbPlayers" >
    </div>
    <div class="mb-3">
        <label>Nombre d'IA</label>
        <input type="text" name="nbAi" >
      </div>
    <div class="mb-3">
        <label>Nombre de manches</label>
        <input type="text" name="nbRounds" >
      </div>
      <div class="mb-3">
        <label>Nombre de dés</label>
        <input type="text" name="nbDices" >
      </div>
      <div class="mb-3">
        <label>Nombre de faces du/des dés</label>
        <input type="text" name="nbFaces" >
      </div>
    <div class="mb-3 form-check">
      <input type="checkbox" name="plusOne">
      <label class="form-check-label" for="exampleCheck1">dés +1 a chaques manches</label>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" name="minusOne">
        <label class="form-check-label" for="exampleCheck1">dés -1 a chaques manches</label>
      </div>
    <button type="submit" class="btn btn-primary" id="buton" style="background: orange">Lancer</button>
</form>
@extends('layouts.footer')
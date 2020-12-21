@include('layouts.base')
    <div id="home">
        <h2>Bienvenue sur<h1 style="color: orange">It-Dice.com !</h1></h2>
        <h3>Parametrez votre partie de dés selon votre envie, puis c'est parti !</h3>
        <form action="/settings">
            <input type="submit" value="C'est parti !" />
        </form>
    </div>
@extends('layouts.footer')
@extends('main')

@section('title', 'Calculator EGS')

@section('content')
    <h1>Calculator EGS</h1>

    <h2>Welcome to the cost calculator for EGS.</h2>

    <div class="form-group">
        <label for="cardnumber">number of cards that you want to grade</label>
        <input type="number" class="form-control" id="cardnumber" name="cardnumber" min="0" oninput="validity.valid||(value='');" placeholder="insert number of cards">
    </div>
    <div class="form-group">
        <label for="certificate">for how many cards would you like to get a certificate?</label>
        <input type="number" class="form-control" id="certificate" name="certificate" min="0" oninput="validity.valid||(value='');" placeholder="insert number of cards">
    </div>
    <div style="margin: 15px 0;">
        <label for="express">Would you like the express service? (service takes half of the time)</label>
        <label class="btn btn-primary">
            <input type="checkbox" id="express" checked autocomplete="off"> Yes
        </label>
    </div>

    <button class="btn btn-primary" onclick="calculate()">Calculate</button>

    <div style="margin: 15px 0;">
        <label for="cost">Grading your cards at EGS will cost you: (plus shipping)</label>
        <input type="text" class="form-control" id="cost" name="cost" readonly>
    </div>

    <p>
        *These numbers are not exact. There can be updates from EGS, higher or lower evaluations of the price or different shipping costs.
        In addition some services might not be available because of high demand.
        This calculator should just give you a rough idea on the cost of grading your cards.<br><br>

        For more information about EGS and there services visit <a href="https://www.eu-grading.de/services-geb%C3%BChren-1/geb%C3%BChren-preislisten-1/">EGS</a>
        or download the price list.
    </p>

    <script type="text/javascript">
        function calculate(){
            const number = document.getElementById("cardnumber");
            const certificate = document.getElementById("certificate");
            const express = document.getElementById("express");
            const cost = document.getElementById("cost");

            let price;

            price = Math.round(number.value * 20.90 + certificate.value * 3);

            if(express.checked === true){
                cost.value = Math.round(number.value * 20.90 + price) + ' €';
            }
            else{
                cost.value = price + ' €';
            }
        }
    </script>

@endsection

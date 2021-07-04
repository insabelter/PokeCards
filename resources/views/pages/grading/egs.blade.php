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
        <label for="yes">Yes:</label>
        <input type="checkbox" id="express" checked autocomplete="off" style="margin-right: 10px;">
    </div>

    <button class="btn btn-primary" onclick="calculate()">Calculate</button>

    <hr>

    <div class="container" style="margin-top: 15px;">
        <div class="card">
            <div class="card-header">
                Grading your cards at EGS will cost you approximately:
            </div>
            <div class="card-body">
                <p class="float-left">total cost:</p>
                <p class="float-right"><span id="totalcost"></span></p>
            </div>
        </div>
    </div>

    <p>
        *shipping costs and in some cases duty have to be added. These costs are very individual and have to be evaluated by yourself.<br><br>

        **These numbers are not exact. There can be updates from EGS and higher or lower evaluations of the price.
        In addition some services might not be available because of high demand.
        This calculator should just give you a rough idea on the cost of grading your cards.<br><br>

        For more information about EGS and there services visit <a href="https://www.eu-grading.de/services-geb%C3%BChren-1/geb%C3%BChren-preislisten-1/">EGS</a>
        or download the <a href="downloads/EGS_peice_list_Jan_2021.pdf">price list</a>.
    </p>

    <script type="text/javascript">
        /**
         * function that calculates the cost for grading cards at egs
         */
        function calculate(){
            const number = document.getElementById("cardnumber");
            const certificate = document.getElementById("certificate");
            const express = document.getElementById("express");
            const totalcost = document.getElementById("totalcost");

            let price;

            //automatic change -> you can not certificate more cards than you want to be graded
            if(certificate.value > number.value){
                certificate.value = number.value;
            }

            price = number.value * 20.90 + certificate.value * 3;

            if(express.checked === true){
                price = number.value * 20.90 + price;
            }

            //discount for different amout of cards
            if(number.value >= 100){
                totalcost.innerHTML = Math.round(price * 0.85) + " €";
            }
            else if(number.value >= 65){
                totalcost.innerHTML = Math.round(price * 0.86) + " €";
            }
            else if(number.value >= 30){
                totalcost.innerHTML = Math.round(price * 0.87) + " €";
            }
            else if(number.value >= 10){
                totalcost.innerHTML = Math.round(price * 0.9) + " €";
            }
            else {
                totalcost.innerHTML = Math.round(price) + " €";
            }
        }
    </script>

@endsection

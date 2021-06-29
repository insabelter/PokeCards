@extends('main')

@section('title', 'Calculator PSA')

@section('content')
    <h1>Calculator PSA</h1>

    <h2>Welcome to the cost calculator for grading your cards at PSA.</h2>

    <h3>In the following you have to enter the number of cards you own for each price range.</h3>

    <div class="form-group">
        <label for="economycard">cards valued less than 499$</label>
        <input type="number" class="form-control" id="economycard" name="test" min="0" oninput="validity.valid||(value='');" placeholder="insert number of cards">
    </div>
    <div class="form-group">
        <label for="regularcard">cards valued between 500$ and 999$:</label>
        <input type="number" class="form-control" id="regularcard" name="test" min="0" oninput="validity.valid||(value='');" placeholder="insert number of cards">
    </div>
    <div class="form-group">
        <label for="expresscard">cards valued between 1000$ and 2499$:</label>
        <input type="number" class="form-control" id="expresscard" name="test" min="0" oninput="validity.valid||(value='');" placeholder="insert number of cards">
    </div>
    <div class="form-group">
        <label for="superexpresscard">cards valued between 2500$ and 4999$:</label>
        <input type="number" class="form-control" id="superexpresscard" name="test" min="0" oninput="validity.valid||(value='');" placeholder="insert number of cards">
    </div>
    <div class="form-group">
        <label for="walk-throughcard">cards valued between 5000$ and 9999$:</label>
        <input type="number" class="form-control" id="walk-throughcard" name="test" min="0" oninput="validity.valid||(value='');" placeholder="insert number of cards">
    </div>

    <button type="submit" class="btn btn-primary">Calculate</button>

    <p>
        *These numbers are not exact. There can be updates from PSA, higher or lower evaluations of the price or different shipping costs.
        In addition some services might not be available because of high demand.
        This calculator should just give you a rough idea on the cost of grading your cards.<br><br>

        For more information about PSA and there services visit <a href="https://www.psacard.com/pricing">PSA</a>.
    </p>




@endsection

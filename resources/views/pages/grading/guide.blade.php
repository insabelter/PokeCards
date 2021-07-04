@extends('main')

@section('title', 'Grading')

@section('content')
    <h1 class="text-center">Welcome to the grading guide!</h1>

    <h2>Right here you will learn anything you need to know about grading pokémon cards.</h2>

    <hr>

    <div>
        <h4>What is grading?</h4>

        Cards are graded to check the condition and verify that they are real. A professional company looks at different
        factors that determine how the condition of the card is. Then they give it a number from 1 to 10 that defines the
        condition, where 10 is the best grade. Then it is put in an acryl case to protect it and on the case it says the name,
        grade, company and there is a QR code for instant access to the certification.
    </div>
    <br>
    <div>
        <h4>Why is it important?</h4>

        At first it can be important for you as a collector because you like the look of a graded card and you know exactly how
        the condition is. The other aspect which is more important for most people is selling cards. When there is a card that isn't
        graded either the seller nor the buyer are sure about the condition and also about the authenticity. So it is difficult to
        make a deal and there has to be trust. When the card is graded it is sure that the card is real and the condition is clear.
        You can find prices for each card with every condition so a rough price range is clear. And then making a deal is very easy.<br>
        The problem is that there a more and more people trying to sell fake cards. So buying graded cards is mostly the best decision
        as a buyer. In addition a graded card has more value. It is a recognized aspect for collectors and the price for grading is
        included.
    </div>
    <br>
    <div>
        <h4>How is the condition evaluated?</h4>

        The following four aspects are important when grading a card. Use these points to do an evaluation by yourself. When you are
        sending your cards to a grading service you should know the condition roughly. The condition determines the value of the card
        and to know how much grading your cards will cost you, you need to know the value of each card.<br><br>
        <ol>
            <li>Surface Scratching</li>
            You need to inspect the surface of the front and the back of the card. There are many ways a card can have surface damage.
            There are dents, dings, scratches and printing defects that can worsen the grade of your card. It is helpful to use lot's of
            light and tilting the card when looking at the surface. Very important is the front of holographic cards.
            <li>Border Centering</li>
            Pokémon cards are punched out by machines and these work often but not always perfect. Evenly centered cards get higher grades.
            That means that the edges have the same size on each side. You need to look at both the front and the back of the card.
            <li>Sharp Corners</li>
            The corners have to be sharp and have solid color. There shouldn't be any white on the corners and they shouldn't be soft
            as you maybe know it from played cards.
            <li>Solid Edges</li>
            The edges are pretty similar to the corners. You want as little as possible whitening, flaking, dings or dents.
        </ol>
        It is important to check the condition by yourself because it also doesn't make sense to send cards in poor condition to a
        grading service. The cost for garding could be higher than the value of the card.
    </div>
    <br>
    <div>
        <h4>How much does it cost?</h4>

        Grading your cards gives them more value but it can be expensive. The costs come from three different points:<br><br>
        <ol>
            <li>the price for the grading</li>
            The companies have different price models. For some services you pay the same price for each card. Other companies
            charge different price for different cards depending on their value. On addition there can be an express service that
            costs extra.
            <li>the shipping</li>
            Of course you have to send your package to the company and receive it back which costs money. Some companies are in the USA
            like PSA and others are in europe like EGS. So depending on your address you have to find the service that is best fpr you and
            you need to calculate the costs. It could also get expensive because you want to send your cards insured.
            <li>possible duty</li>
            At last there can be an additionally duty when you are receiving the cards back. For example you would pay 19% duty
            of the value of the package extra. And this is the value when the cards are graded that could get pretty high.
        </ol>

        If you have cards that you would
        like to grade you can use our calculators to get a rough price range to know how much the grading would cost.<br>
        We focused on two companies, the biggest one which is <a href="{{route('psa')}}">PSA</a> and a good option for europe
        that is <a href="{{route('egs')}}">EGS</a>.
    </div>

@endsection

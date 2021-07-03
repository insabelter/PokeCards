@extends('main')

@section('title', '')

@section('content')
    <h1>Welcome to PokéCards!</h1>

    <p class="aligncenter">
        <img src="{{asset('images/pokemon/pikachu_big.png')}}" alt="pikachu" class="aligncenter"/>
    </p>

    <h2>This is the place to go when you’re all about pokémon and especially pokémon cards.</h2>

    <p class="aligncenter">
        <img src="{{asset('images/icons/pokeball.png')}}" alt="pokeball" class="aligncenter"/>
        <img src="{{asset('images/icons/superball.png')}}" alt="pokeball" class="aligncenter"/>
        <img src="{{asset('images/icons/ultraball.png')}}" alt="pokeball" class="aligncenter"/>
    </p>

    <h2>You know the goal: <b>Gotta catch 'em all</b> – or as we would say: <b>Gotta collect 'em all!</b></h2>

    <hr>

    <h2 class="text-center">What is this website about?</h2>

    <h5>It's all about the passion towards pokémon cards and having fun with playing or collecting them.
    Either if you are a beginner and this topic is new to you and you would like to explore all the cards out there
    or if you a passionate collector and player for years. We all come from different era's of pokémon cards ans some of
    us may have discovered the video games first, others the cards and in turn others saw the anime first.</h5>

    <h3 class="text-center">These are the topics:</h3>

    <div>
        <h4>1. Exploring cards</h4>

        As you may know the first cards came out in 1996 in japan. Since then hundreds of cards have been published from different sets
        and in different languages. As of today (2021) there are round about 13.500 cards out there. You can check out all these cards
        in our wiki. You could either look for a specific card in our <a href="{{route('card-search')}}">card search</a> or check out
        cards of all the sets in the <a href="{{ route('set-explorer-sets', 'x') }}">set explorer search</a>.
    </div>
    <br>
    <div>
        <h4>2. Trading Cards</h4>

        As we sad before: you gotta collect 'em all. We bring together sellers and buyers on our marketplace. As a buyer
        you can search for a specific card on the marketplace or you can explore cards on the wiki and check from there
        if there any offers. In addition you can put offers on your watchlist. As a buyer you look for cards in the wiki
        and create an offer from there. The contact works via mail.<br>
        You need an account to use the marketplace. Register <a href="{{route('register')}}">here</a>.
    </div>
    <br>
    <div>
        <h4>3. Card grading</h4>

        An important topic when we are talking about trading cards is the grading. Cards are graded to check the condition and
        verify that they are real. If this topic is new to you, read our <a href="{{route('guide')}}">grading guide</a> to get
        an idea of this topic. There are different companies that grade cards professionally. If you have cards that you would
        like to grade you can use our calculators to get a rough price range to know how much the grading would cost. We
        focused on two companies, the biggest one <a href="{{route('psa')}}">PSA</a> and a good option for europe
        <a href="{{route('egs')}}">EGS</a>.
    </div>

    <hr>

    <h2 class="text-center">Become a part of the community and create an <a href="{{route('register')}}">account</a>.

@endsection

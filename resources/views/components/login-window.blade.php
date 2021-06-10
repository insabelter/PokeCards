<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border: 1px solid rgba(161, 191, 237, 0.5); margin-top: 15px;">
                <div class="card-header"><h1>{{ __($title) }}</h1></div>

                <div class="card-body">
                    {{ $slot  }}
                </div>
            </div>
        </div>
    </div>
</div>

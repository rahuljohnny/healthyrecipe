@extends('layout.main')
@section('title','recipes')
@section('content')
    <!-- products listing -->
    <!-- Latest SHirts -->

    <div class="row" >
        {{--@forelse($shirts as $shirt) --}}

        <div class="small-3 medium-3 large-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="butt" class="button expanded add-to-cart">
                        Add to Cart
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/ilUDVRL2w3Y/maxresdefault.jpg" alt="image"/>
                    </a>
                </div>
                <a href="shirts/3">
                    <h3>
                        Alu paratha
                    </h3>
                </a>
                <h5>
                    121
                </h5>
                <p>
                    ghdfg fcnbfg bf
                </p>
            </div>
        </div>

        <div class="small-3 medium-3 large-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="butt" class="button expanded add-to-cart">
                        Add to favourits
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/ilUDVRL2w3Y/maxresdefault.jpg" alt="image"/>
                    </a>
                </div>
                <a href="shirts/3">
                    <h3>
                        Alu paratha
                    </h3>
                </a>
                <h5>
                    121
                </h5>
                <p>
                    ghdfg fcnbfg bf
                </p>
            </div>
        </div>

        <div class="small-3 medium-3 large-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="butt" class="button expanded add-to-cart">
                        Add to favourits
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/ilUDVRL2w3Y/maxresdefault.jpg" alt="image"/>
                    </a>
                </div>
                <a href="shirts/3">
                    <h3>
                        Alu paratha
                    </h3>
                </a>
                <h5>
                    121
                </h5>
                <p>
                    ghdfg fcnbfg bf
                </p>
            </div>
        </div>
        <div class="small-3 medium-3 large-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="butt" class="button expanded add-to-cart">
                        Add to favourits
                    </a>
                    <a href="#">
                        <img src="https://i.ytimg.com/vi/ilUDVRL2w3Y/maxresdefault.jpg" alt="image"/>
                    </a>
                </div>
                <a href="shirts/3">
                    <h3>
                        Alu paratha
                    </h3>
                </a>
                <h5>
                    Calorie: 121
                </h5>

                <h3>
                    Ingredients:
                </h3>
            </div>
        </div>




        {{--@endforelse --}}

    </div>

@endsection
<div class="slider-container">
  <div class="slider">
    <div class="slide-track">
      <div class="slide-flex">
        @foreach($rightSlideItems as $rightSlideItem)
          <div class="slide-item" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="slide-border">
              <a href="{{ route('cart.details', $rightSlideItem->id) }}">
              <div class="slide-content">
                <img src="{{ asset('storage/' . $rightSlideItem->product_image) }}" class="slide-image" alt="{{ $rightSlideItem->title }}">
                @php
                    $title = $rightSlideItem->title;
                    $length = Str::length($title);
                    if ($length > 25) {
                        $displayTitle = Str::substr($title, 0, 25);
                    } elseif ($length < 25) {
                        $displayTitle = $title . str_repeat('.', 25 - $length);
                    } else {
                        $displayTitle = $title;
                    }
                @endphp

                <h3 class="font-bold text-lg mt-3 text-gray-800 hover:text-blue-600 transition">
                    {{ $displayTitle }}
                </h3>
                <div class="slide-price">
                  <p class="current-price">৳{{ number_format($rightSlideItem->offer_price, 2) }}
                    <span class="old-price">
                      <del>৳{{ number_format($rightSlideItem->real_price, 2) }}</del>
                    </span>
                  </p>
                   {{-- Stock Status --}}
                    @if($rightSlideItem->status == 'in stock')
                        <p class="text-green-600 text-sm mb-1">✅ {{ $rightSlideItem->status }}</p>
                    @else
                        <p class="text-red-600 text-sm mb-1">❌ {{ $rightSlideItem->status }}</p>
                    @endif
                </div>
              </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

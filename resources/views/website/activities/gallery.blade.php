@foreach ($image_categories as $gallery)
    <div class=" mt-5 mb-5">
        <div class="bg-au-gold px-1 py-2 mb-5 rounded">
            <h1 class="text-sm font-bold">{{ $gallery->title }}</h1>
            <p class="title-heading font-light text-xs">{{ $gallery->description }}</p>
        </div>
        <div class="flex flex-wrap">
            @foreach ($gallery->images as $image)
                <div class="w-60 mr-5 mb-10">
                    <a data-lightbox="{{ $gallery->title }}" href="{{ asset('storage/' . $image->image) }}">
                        <img class="h-56 w-60 rounded" src="{{ asset('storage/' . $image->image) }}"
                            alt="{{ $image->caption }}" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endforeach

@foreach ($image_categories as $gallery)
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="title-heading text-center text-md-left">
                <h1>{{ $gallery->title }}</h1>
                <br />
                <p class="title-heading">{{ $gallery->description }}</p>
            </div>
            <br />
            <div style="margin-top: 150px; display: flex; justify-content: start">
                @foreach ($gallery->images as $image)

                    <a href="{{ asset('storage/' . $image->image) }}" data-lightbox="{{ $image->grouping }}"
                        data-title="{{ $image->title }}" style="width: fit-content">
                        <img style="width: 200px; height: auto; border-radius: 5px; margin: 0 10px"
                            src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption }}" />
                    </a>
                @endforeach
            </div>
        </div>
        <!--end col-->
    </div>
@endforeach

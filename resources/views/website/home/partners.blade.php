<section class="my-5">
    <div class="border-b-2">
        <h1 class="border-b-2 border-au-red w-16 text-lg mb-0 text-au-red">Partners</h1>
    </div>
    <div class="flex">
        @foreach ($partners as $partner)
            <div class="col-lg-2 col-md-2 col-6 py-4 mr-5">
                <a href="{{ $partner->url }}" target="_blank">
                    <img src="{{ asset('storage/' . $partner->logo) }}" class="avatar avatar-ex-sm"
                        style="height: 80px; width: auto" alt="">
                </a>
            </div>
            <!--end col-->
        @endforeach
    </div>
</section>

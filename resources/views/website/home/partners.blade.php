<section class="page-section">
    <div class="section-content">
        <div class="section-title">
            <h1>Partners</h1>
        </div>
        <div class="section-details carousel">
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
    </div>
</section>

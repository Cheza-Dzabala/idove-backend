@foreach ($video_categories as $category)
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="title-heading text-center text-md-left">
                <h3>{{ $category->title }}</h3>
                <p class="text-white para-desc mt-3 mb-0">
                <p class="title-heading">{{ $category->description }}</p>
            </div>
            <div class="row">
                @foreach ($category->videos as $video)
                    <video id="video-{{ $video->id }}" class="video-js" controls preload="auto" width="640" height="264"
                        data-setup="{}">
                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                        </p>
                    </video>
                @endforeach
            </div>
        </div>
        <!--end col-->
    </div>
@endforeach

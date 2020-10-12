@foreach ($video_categories as $category)
    <div class="mx-5 mb-5">
        <div class="bg-au-gold px-1 py-2 mb-5 rounded">
            <h1 class="text-sm font-bold">{{ $category->title }}</h1>
            <p class="title-heading font-light text-xs">{{ $category->description }}</p>
        </div>
        <div class="flex flex-wrap">
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
        <!--end col-->
    </div>
@endforeach

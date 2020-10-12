                    <h4 class="widget-title">Resources</h4>
                        @foreach ($documents as $document)
                            <div class="p-4 mt-4 rounded shadow">
                                <div class=" post-recent">
                                    <h6>Name:</h6>
                                    <div class="post-recent-content float-left">{{ $document->name }}</div>
                                    <br/>
                                    <br/>
                                    <h6>Summary:</h6>
                                    <div class="post-recent-content float-left">{{ $document->summary }}</div>
                                    <br/>
                                    <br/>
                                    <a href="/resources/download/{{$document->id}}" target="_blank">Download File</a>
                                </div>
                            </div>
                        @endforeach

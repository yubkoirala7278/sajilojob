<div class="section">
    <div class="container">
        <div class="d-md-flex justify-content-between">
            <div class="col-md-8">
                <!-- title start -->
                <div class="titleTop text-center">
                    <div class="subtitle mb-2" style="color:#373092">{{ __('Here You Can See') }}</div>
                    <h5>{{ __('Latest') }} <span style="color:#373092">{{ __('Blogs') }}</span></h5>
                </div>
                <!-- title end -->

                <ul class="jobslist row">
                    @if (null !== $blogs)
                        <?php $count = 1; ?>
                        @foreach ($blogs as $blog)
                            <?php
                            $cate_ids = explode(',', $blog->cate_id);
                            $data = DB::table('blog_categories')
                            ->whereIn('id', $cate_ids)
                            ->get();
                            $cate_array = [];
                            foreach ($data as $cat) {
                            $cate_array[] = "<a href='" . url(' /blog/category/') . '/' . $cat->slug .
                                "'>$cat->heading</a>";
                            }
                            ?>
                            <li class="col-sm-4">
                                <div class="bloginner">
                                    <div class="postimg">
                                        @if (null !== $blog->image && $blog->image != '')

                                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}"
                                                alt="{{ $blog->heading }}">
                                        @else
                                            <img src="{{ asset('images/blog/1.jpg') }}" alt="{{ $blog->heading }}">
                                        @endif
                                    </div>

                                    <div class="post-header">
                                        <h4><a
                                                href="{{ route('blog-detail', $blog->slug) }}">{{ $blog->heading }}</a>
                                        </h4>
                                        <div class="postmeta">Category : {!! implode(', ', $cate_array) !!}
                                        </div>
                                    </div>
                                    <p>{!! \Illuminate\Support\Str::limit($blog->content, $limit = 150, $end = '...') !!}</p>

                                </div>
                            </li>


                            <?php $count++; ?>
                        @endforeach
                    @endif
                </ul>
                <!--view button-->
                <div class="viewallbtn"><a href="{{ route('blogs') }}">{{ __('View All Blog Posts') }}</a></div>
                <!--view button end-->
            </div>
            <div class="col-md-4 videowraper">
                <div class="test-video">
                    <div class="embed-responsive embed-responsive-16by9">
                        <!--<iframe src="{{ $video->video_link }}" frameborder="0" allowfullscreen></iframe>-->
                        <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2Fsajilojob%2Fvideos%2F266780345044724%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                    </div>
                    <div class="vidover">
                        <div class="titleTop">
                            <h3>{{ __('Watch Our') }} <span>{{ __('Video') }}</span></h3>
                        </div>
                        <!-- title end -->
                        <!--<p>{{ $video->video_text }}</p>-->
                        <p>
                            We Have Lots Of Vacancy Available On Sajilojob  </P>
                        <p>
                            SEARCH, APPLY & GET JOB
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

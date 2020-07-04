<div class="row">
  @foreach ($videos as $key => $video)
  <div class="col-md-2 my-md-3">
    <div class="card border-0 bg-transparent">
      <a href="{{ route('videos.show', $video->id) }}">
        @if(is_null($video->poster_url))
        <img class="card-img-top" src="https://dummyimage.com/185x274/aaa/fff&text=poster" alt="{{ $video->title }}" style="border-radius: 10px; width:185px; height:274px;">
        @else
        <img class="card-img-top" src="{{ $video->poster_url }}" alt="{{ $video->title }}" style="border-radius: 10px; width:185px; height:274px;">
        @endif
      </a>
      <div class="card-text">
        <a href="{{ route('videos.show', $video->id) }}">
          <h6 class="card-title text-muted">{{ $video->title }}（{{ $video->year }}）</h6>
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>

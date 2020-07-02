<div class="columns is-multiline">
  @foreach ($videos as $key => $video)
  <div class="column is-2">
    <div class="card video-item is-shadowless">
      <div class="card-image">
        <figure class="image">
          <a href="{{ route('videos.show', $video->id) }}">
            @if(is_null($video->poster_url))
            <img src="https://dummyimage.com/185x264/aaa/fff&text=poster" alt="{{ $video->title }}" style="border-radius: 10px;">
            @else
            <img src="{{ $video->poster_url }}" alt="{{ $video->title }}" style="border-radius: 10px; width:185px; height:274px;">
            @endif
          </a>
        </figure>
      </div>
      <div class="card-content">
        <div class="content">
          <a href="{{ route('videos.show', $video->id) }}">
            <h4 class="is-size-6 has-text-centered">{{ $video->title }}（{{ $video->year }}）</h4>
          </a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

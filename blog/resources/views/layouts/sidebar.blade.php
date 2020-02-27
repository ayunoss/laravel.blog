<div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>This is my test project on <em><strong>Laravel</strong> framework</em> based on my <strong>PHP</strong> knowledge. Enjoy!</p>
</div>
<div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
        @foreach ($archives as $item)
            <li>
                <a href="/?month={{ $item->month }}&year={{ $item->year }}">
                    {{ $item->month . ' ' . $item->year }}
                </a>
            </li>
        @endforeach
    </ol>
</div>
<div class="sidebar-module">
    <h4>Tags</h4>
    <ol class="list-unstyled">
            @foreach ($tags as $tag)
            <li>
                <a href="/posts/tags/{{$tag}}">
                    #{{ $tag }}
                </a>
            </li>
            @endforeach
    </ol>
</div>
<div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
        <li><a href="https://github.com/ayunoss">GitHub</a></li>
        <li><a href="https://t.me/ayunoss">Telegram</a></li>
        <li><a href="https://instagram.com/ayunosss">Instagram</a></li>
    </ol>
</div>

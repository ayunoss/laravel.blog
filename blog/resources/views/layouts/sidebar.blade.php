<div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
</div>
<div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
        <ul>
            @foreach ($archives as $item)
                <li>
                    <a href="/?month={{ $item->month }}&year={{ $item->year }}">
                        {{ $item->month . ' ' . $item->year }}
                    </a>
                </li>
            @endforeach
        </ul>
    </ol>
</div>
<div class="sidebar-module">
    <h4>Categories</h4>
    <ol class="list-unstyled">
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="/?category={{$category}}">
                        {{ $category }}
                    </a>
                </li>
            @endforeach
        </ul>
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

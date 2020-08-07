<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- uikit --}}
        <link rel="stylesheet" href="/css/uikit.min.css" async>
        <link rel="stylesheet" href="/css/app.css" async>
        <script src="/js/uikit.min.js"></script>
        <script src="/js/uikit-icons.min.js" async></script>
        <!--favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/site.webmanifest">
        <link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#7bc15f">
        <meta name="msapplication-TileColor" content="#2b5797">
        <meta name="theme-color" content="#ffffff">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!---->
        <title>{{ config('app.name') }}</title>
    </head>
    <body data-barba="wrapper">
        <div data-barba="container">
                @yield('body')
        </div>
        <div class="player" data-barba="wrapper">
            {{-- セッションから取り出し --}}
                @if($value = session('playnow'))
                    <div id="seekbar" class="seekbar"></div>
                    <button class="controller" id="prev"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"/></svg></button>
                    <button class="controller" id="play"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M8 5v14l11-7z"/></svg></button>
                    <button class="controller" id="next"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 18l8.5-6L6 6v12zM16 6v12h2V6h-2z"/></svg></button>
                    <audio id="player" controls src="{{ asset(session('playnow')->audio_path) }}">
                        Your browser does not support the
                        <code>audio</code> element.
                    </audio>
                    <p class="title"><a href="{{ route('posts.detail',[ 'post'=>session('playnow')->id ]) }}">{{ session('playnow')->title }}</a></p>
                    <p id="current">00:00</p>
                    <button class="nextgb">Like</button>
                    <p id="duration">00:00</p>
                @endif
        </div>
        {{-- 非同期処理 --}}
        <script src="https://unpkg.com/@barba/core"></script>
        <script type="text/javascript">
            barba.init({
                preventRunning: true
            });
            {{-- 移動先が同じページだったらページを遷移させない --}}
            const eventDelete = e => {
                if (e.currentTarget.href === window.location.href) {
                    e.preventDefault()
                    e.stopPropagation()
                    return
                }
            };

            const links = [...document.querySelectorAll('a[href]')]
                links.forEach(link => {
                link.addEventListener('click', e => {
                    eventDelete(e)
                }, false)
            });

        </script>
        {{-- <audio>操作</audio> --}}
        <script>
            var prev = document.getElementById('prev');
            var play = document.getElementById('play');
            var next = document.getElementById('next');
            var audio = document.getElementById('player');
            {{-- 長さを代入 --}}
            document.getElementById('current').innerHTML = playTime(Math.floor(audio.currentTime));
            document.getElementById('duration').innerHTML = playTime(Math.floor(audio.duration));

            audio.addEventListener("timeupdate", (e) => {
                const current = Math.floor(audio.currentTime);
                const duration = Math.round(audio.duration);
                {{-- 長さを代入 --}}
                document.getElementById('current').innerHTML = playTime(current);
                document.getElementById('duration').innerHTML = playTime(duration);
                const percent = Math.round((audio.currentTime/audio.duration)*1000)/10;
                document.getElementById('seekbar').style.backgroundSize = percent + '%';
            });

            play.onclick = function () {
                {{-- 再生してるか判断 再生・一時停止 --}}
                if(audio.paused) {
                    audio.play();
                    play.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>';
                } else {
                    audio.pause();
                    play.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" width="1em" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"/><path d="M8 5v14l11-7z"/></svg>';
                }
            };
            document.getElementById('seekbar').addEventListener("click", (e) => {
                const current = Math.floor(audio.currentTime);
                const duration = Math.round(audio.duration)
                if(!isNaN(duration)){
                    const mouse = e.pageX
                    const element = document.getElementById('seekbar')
                    const rect = element.getBoundingClientRect()
                    const position = rect.left + window.pageXOffset
                    const offset = mouse - position
                    const width = rect.right - rect.left
                    audio.currentTime = Math.round(duration * (offset / width))
                }
            })
            function playTime (t) {
                let hms = ''
                const h = t / 3600 | 0
                const m = t % 3600 / 60 | 0
                const s = t % 60
                const z2 = (v) => {
                    const s = '00' + v
                    return s.substr(s.length - 2, 2)
                }
                if(h != 0){
                    hms = h + ':' + z2(m) + ':' + z2(s)
                }else if(m != 0){
                    hms = z2(m) + ':' + z2(s)
                }else{
                    hms = '00:' + z2(s)
                }
                return hms
            }
        </script>
    </body>
</html>
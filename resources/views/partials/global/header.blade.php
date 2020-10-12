<article>
    <header>
        <div class="navigation-menu">
            <button class="hamburger" id="show-menu" onclick="showMenu()">Show Menu</button>
            <ul class="navigation" id="menu">
                <li class="nav-item">
                    <a href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#">iDovers</a>
                </li>
                <li class="nav-item">
                    <a href="#">Projects</a>
                </li>
                <li class="nav-item">
                    <a href="/activities">Activities</a>
                </li>
                <li class="nav-item">
                    <a href="#">Forums</a>
                </li>
                <li class="nav-item">
                    <a href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </header>
</article>

@section('js')
    <script>
        let isShowing = false;
        const showMenu = () => {
            var menu = document.getElementById('menu');
            if (isShowing) {
                menu.style.display = 'none'
                isShowing = false;
            } else {
                menu.style.display = 'block'
                isShowing = true;
            }
        }

    </script>
@endsection

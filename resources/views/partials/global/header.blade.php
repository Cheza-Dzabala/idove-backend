<div class="px-96">
    <nav class="flex flex-wrap items-center justify-between bg-au-green rounded">
        <!-- hamburger -->
        <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
                    width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
                    width="40" height="40" />
            </button>
        </div>

        <!-- links -->
        <div
            class="toggle hidden md:flex w-full md:w-auto text-left text-xs mt-5 md:mt-0 hover:border-b-2 hover:border-au-gold ">
            <a href="/"
                class="block md:inline-block text-white hover:text-black hover:bg-au-gold px-5 py-4  border-blue-900 md:border-r-2 md:border-au-gold">Home</a>
            <a href="/idovers"
                class="block md:inline-block text-white hover:text-black hover:bg-au-gold px-5 py-4  border-blue-900 md:border-r-2 md:border-au-gold">iDovers</a>
            <a href="/projects"
                class="block md:inline-block text-white hover:text-black hover:bg-au-gold px-5 py-4  border-blue-900 md:border-r-2 md:border-au-gold">Projects</a>
            <a href="/activities"
                class="block md:inline-block text-white hover:text-black hover:bg-au-gold px-5 py-4  border-blue-900 md:border-r-2 md:border-au-gold">Activities</a>
            <a href="/forums"
                class="block md:inline-block text-white hover:text-black hover:bg-au-gold px-5 py-4  border-blue-900 md:border-r-2 md:border-au-gold">Forums</a>
            <a href="/about"
                class="block md:inline-block text-white hover:text-black hover:bg-au-gold px-5 py-4  border-blue-900 md:border-r-2 md:border-au-gold">About
                Us</a>
            <a href="/contact-us"
                class="block md:inline-block text-white hover:text-black hover:bg-au-gold px-5 py-4  border-blue-900 md:border-r-2 md:border-au-gold">Contact
                Us</a>
        </div>
        <!-- cta -->
    </nav>
</div>


<script>
    document.getElementById("hamburger").onclick = function toggleMenu() {
        const navToggle = document.getElementsByClassName("toggle");
        for (let i = 0; i < navToggle.length; i++) {
            navToggle.item(i).classList.toggle("hidden");
        }
    };

</script>

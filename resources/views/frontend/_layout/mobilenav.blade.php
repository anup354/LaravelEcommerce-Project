<div class="max-md:block hidden px-5 py-1 bottom-0 sticky z-[999] bg-white border-t-2">
    <div class="flex items-center justify-between ">
        <a href="
        {{ route('home') }}
        "
            class="nav-link flex flex-col justify-center items-center  text-gray-500  {{ request()->is('/') ? 'active' : 'inactive' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentcolor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M10 12h4v4h-4z" />
            </svg>
            <p class="text-xs font-medium ">Home</p>
        </a>
        <a href="{{route("allcategories")}}"
            class="nav-link flex flex-col justify-center items-center  text-gray-500 {{ request()->is('categories') ? 'active' : 'inactive' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-filled" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" stroke-width="0"
                    fill="currentColor" />
                <path d="M20 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" stroke-width="0"
                    fill="currentColor" />
                <path d="M10 13h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z" stroke-width="0"
                    fill="currentColor" />
                <path d="M17 13a4 4 0 1 1 -3.995 4.2l-.005 -.2l.005 -.2a4 4 0 0 1 3.995 -3.8z" stroke-width="0"
                    fill="currentColor" />
            </svg>
            <p class="text-xs font-medium ">Categories</p>
        </a>
        <a href="
        {{ route('allblogs') }}
        "
            class="flex flex-col justify-center items-center text-gray-500 {{ request()->is('blogs') ? 'active' : 'inactive' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-pencil" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                <path d="M10 18l5 -5a1.414 1.414 0 0 0 -2 -2l-5 5v2h2z" />
            </svg>
            <p class="text-xs font-medium ">Blog</p>
        </a>

        <a href="
            {{ route('contactus') }}
            "
            class="flex flex-col justify-center items-center text-gray-500 {{ request()->is('contact') ? 'active' : 'inactive' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-address-book" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                <path d="M10 16h6" />
                <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M4 8h3" />
                <path d="M4 12h3" />
                <path d="M4 16h3" />
            </svg>

            <p class="text-xs font-medium ">Contact</p>

        </a>

    </div>
</div>
<style>
    .active {
        color: #ff0000;
        /* Red text color for active link */
    }

    .inactive {
        color: #333;
        /* Default text color for inactive links */
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all elements with the class "nav-link"
        var navLinks = document.querySelectorAll('.nav-link');

        // Add a click event listener to each nav link
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Remove the "active" class from all links
                navLinks.forEach(function(navLink) {
                    navLink.classList.remove('active');
                });

                // Add the "active" class to the clicked link
                link.classList.add('active');
            });
        });
    });
</script>

@extends('layouts.app')
@section('body-content')

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section  class="blog-posts-container w-full md:w-2/3 flex flex-col items-center px-3">
            
            <div id="blogPosts">

            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                    <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
                </div>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Follow @dgrzyb
                </a>
            </div>

        </aside>

    </div>
    
@endsection


<script>
    window.onload = function()
    {
        // blog.js
        fetchBlogPosts();
        async function fetchBlogPosts() {
            let URL = "/api/posts";
            try {
                const response = await axios.get(URL);
                const posts = response.data;
                console.log(posts);
                // Iterate over the blog posts and create HTML elements for each post
                posts.forEach((post) => {
                    document.getElementById('blogPosts').innerHTML += (
                        `<article class="flex flex-col shadow my-4">
                        <!-- Article Image -->
                        <a href="/post/${post['id']}" class="hover:opacity-75">
                            <img src="${post['postImg']}" alt="Post Image">
                        </a>
                        <div class="bg-white flex flex-col justify-start p-6">
                            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">${ post['category']['cat_name'] }</a>
                            <a href="/post/${post['id']}" class="text-3xl font-bold hover:text-gray-700 pb-4">${post['title']}</a>
                            <p href="/post/${post['id']}" class="text-sm pb-3">
                                By <a href="#" class="font-semibold hover:text-gray-800">${ post['user']['name'] }</a>
                            </p>
                            <a href="/post/${post['id']}" class="pb-6">${post['content'].slice(0, 200)}</a>
                            
                            <a href="/post/${post['id']}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>`
                    );
                });
            } catch (error) {
                console.error(error);
                // Handle the error, e.g., display an error message
            }
        }
}

</script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    

    <script>
        function getCarouselData() {
            return {
                currentIndex: 0,
                images: [
                    'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=9',
                ],
                increment() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                },
                decrement() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                },
            }
        }
    </script>


{{-- <script>
    // blog.js

async function fetchBlogPostDetails(postId) {
  try {
    const response = await axios.get(`/post/${postId}`);
    const blogPost = response.data;

    // Call a function to update the DOM with the blog post details
    updateBlogPostDetails(blogPost);
  } catch (error) {
    console.error(error);
    // Handle the error, e.g., display an error message
  }
}

function updateBlogPostDetails(blogPost) {
  const container = document.getElementById('blog-post-details');

  // Clear the container
  container.innerHTML = '';

  // Create HTML elements for the blog post details
  const titleElement = document.createElement('h2');
  const contentElement = document.createElement('p');

  // Set the content of the HTML elements
  titleElement.textContent = blogPost.title;
  contentElement.textContent = blogPost.content;

  // Append the HTML elements to the container
  container.appendChild(titleElement);
  container.appendChild(contentElement);
}

// Call the function to fetch and display the blog post details
const postId = 1; // Replace with the actual ID of the blog post you want to display
fetchBlogPostDetails(postId);
</script> --}}
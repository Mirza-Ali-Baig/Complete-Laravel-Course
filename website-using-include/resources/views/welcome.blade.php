<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}   ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>

@include("pages.navbar")
<!-- Hero Section -->
@include("pages.hero")
<!-- Services Section -->
@include("pages.services")
<!-- About Section -->
@include("pages.about")
<!-- Work Section -->
@include("pages.work")
<!-- Contact Section -->
@include("pages.contact")
<!-- Footer Section -->
@include("pages.footer")
<!-- Full-Screen Loader -->
<div class="loader-wrapper">
    <div class="loader"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Add Bootstrap Icons CDN for the navbar-toggler icon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.js"></script>
<script>
    // JavaScript to fade out loader once content is loaded
    window.addEventListener('load', function() {
        const loaderWrapper = document.querySelector('.loader-wrapper');
        loaderWrapper.classList.add('fade-out');
        setTimeout(() => {
            loaderWrapper.style.display = 'none';
        }, 500);
    });
</script>
</body>
</html>

<?php

?>

<style>
    #layout {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 10px;
    }

    #layout section {
        flex-basis: 40%;
    }
</style>

<h1>Life</h1>
<p style="text-align: center">Welcome to my world</p>

<div id="layout">

    <section>

        <header>
            <h2>Destinations</h2>
        </header>

        <h3>Latest</h3>

        <h4>Saguaro National Park, Arizona</h4>
        <photo-gallery>
            <a href="/places/arizona/saguaroNP" alt="Silhouette of a saguaro cactus against a sunset sky"><img src="/pages/places/arizona/saguaroNP/20250518-O5180044.jpg" /></a>
        </photo-gallery>

        <h3>Previous</h3>

        <h4>Quintana Beach, Texas</h4>
        <photo-gallery>
            <a href="/places/quintana"><img src="/pages/places/quintana/20240608_063753_(WebShare).jpg" /></a>
        </photo-gallery>

    </section>



    <section>
        
        <header>
            <h2>Pets</h2>
        </header>

        <h3>Current</h3>

        <h4>Maisie</h4>
        <photo-gallery>
            <a href="/pets/maisie" alt="Photo of Maisie, a black and white dog, pictured here running with her ball, looking sleek and athletic"><img src="/pages/pets/maisie/2022_1102_PM_00032_(WebShare).jpg" /></a>
        </photo-gallery>

        <h3>Past</h3>

        <h4>Oreo</h4>
        <photo-gallery>
            <a href="/pets/oreo" alt="Photo of Oreo, a black and white dog, pictured here laying on a bed looking up at the camera"><img src="/pages/pets/oreo/oreo8.jpg" /></a>
        </photo-gallery>

    </section>


</div>
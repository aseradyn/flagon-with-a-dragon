<style>
    #layout {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 10px;
    }

    #layout section {
        flex-basis: 40%;
        max-width: calc(100vw - 50px);
    }
    h4, a {
        margin-bottom: 0px;
        justify-self: center;
    }

    #layout .photo-gallery {
        margin-top: 5px;
    }

    .more {
        display: flex;
        justify-content: space-around;
        gap: 10px;
        flex-wrap: wrap;
    }

</style>

<h1>Life</h1>
<p style="text-align: center">Welcome to my world</p>

<div id="layout">

    <section>

        <header>
            <h2>Destinations</h2>
        </header>

        <a href="/places/arizona/saguaroNP"><h4>Saguaro National Park, Arizona</h4>
        <photo-gallery isDirectory="true">
            <img src="/pages/places/arizona/saguaroNP/20250518-O5180044.jpg" alt="Silhouette of a saguaro cactus against a sunset sky" />
        </photo-gallery>
        </a>

        <div class="more">
            <a href="/places/quintana"><h4>Quintana Beach, Texas</h4>
            <photo-gallery makeThumbnail="true">
                <img src="/pages/places/quintana/20240608_063753_(WebShare).jpg" />
            </photo-gallery></a>

            <a href="/places/seattle">
            <h4>Seattle, Washington</h4>
            <photo-gallery makeThumbnail="true">
                <img src="/pages/places/seattle/20230922-Chihuly-08.jpg" />
            </photo-gallery>
            </a>
        </div>


    </section>



    <section>
        
        <header>
            <h2>Pets</h2>
        </header>

        <a href="/pets/maisie"><h4>Maisie</h4>
        <photo-gallery isDirectory="true">
            <img src="/pages/pets/maisie/2022_1102_PM_00032_(WebShare).jpg" alt="Photo of Maisie, a black and white dog, pictured here running with her ball, looking sleek and athletic" />
        </photo-gallery>
        </a>

        <a href="/pets/oreo"><h4>Oreo</h4>
        <photo-gallery makeThumbnail="true">
            <img src="/pages/pets/oreo/oreo8.jpg" alt="Photo of Oreo, a black and white dog, pictured here laying on a bed looking up at the camera" />
        </photo-gallery>
        </a>

    </section>


</div>
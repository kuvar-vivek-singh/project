<?php
define("preventAccess",TRUE);
?>
<?php
$title="Most Popular wedding songs";
require_once("header.php");
?>

<div class="jumbotron bg-light text-center">
    <h1>Latest Hindi Wedding Songs for <b class="text-success">Sangeet</b> for 2021</h1>
    <p class="text-success">By Abhishek Diwaker and Manzar Khan </p>
</div>
<div class="container" >
    <p>You may be tapping to Despacito, but its the Bollywood songs that will keep
        you in good stead on your wedding. Right from your wedding sangeet to your bridal entry ,
        your shaadi is going to have a generous dose of Bollywood. Naach gaana and bollywood marriage
        songs go hand in hand for any Indian wedding. These hit weddings songs from 2019 are just perfect
        for you even if you are planning your Indian wedding in 2020. So we put together all the hindi songs
        you need at your marriage this year in one post, sorted by type and people!
        Yes, you're welcome.</p>
</div>
<div class="container">
    <h2 class="text-center text-success">Bride & Groom Most Popular Wedding Songs</h2>
    <hr class="text-success" style="border-top: 2px solid;width: 50%;">
    <?php
    for($i=0;$i<2;$i++){ ?>
   
    <div class="card shadow-sm m-2" style="max-width: 70rem;">
        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <h4 class="card-title">Morni Banke from Badhai Ho</h4>
                    <p class="card-text">
                        Nothing beats the energy of a punjabi marriage song, Morni Banke is such a peppy
                        number and dancing on this with your loved one would be so much fun.
                    </p>
                    <p class="card-text"><small class="text-muted">Reading Time : 1-5 min</small></p>
                </div>
            </div>
            <div class="col-md-8">
                <iframe class="card-img-bottom" style="max-width: auto;height: 350px;"
                    src="https://www.youtube.com/embed/1EadhOBcfI0" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            </div>
        </div>
    </div>

    <?php
    }
    ?>
</div>

    <div class="jumbotron bg-white">
        <h1 class="text-center">Fun Bride & Groom Dance Songs</h1>
        <hr class="text-success" style="border-top: 2px solid;">
        <p style="font-size: 20px;">Are you a filmy couple who loves to dance on peppy numbers? Well we have a collection of super fun bollywood wedding songs for all you super chill couples. Pick anyone of
            these marriage songs and you will surely have a blast dancing on these for your wedding in 2020.</p>
       
    </div>
    <div class="container">
     <div class="card shadow-sm m-2" style="max-width: 70rem;">
        <div class="row">
            <div class="col-md-4">
                <div class="card-body">
                    <h4 class="card-title">Morni Banke from Badhai Ho</h4>
                    <p class="card-text">
                        Nothing beats the energy of a punjabi marriage song, Morni Banke is such a peppy
                        number and dancing on this with your loved one would be so much fun.
                    </p>
                    <p class="card-text"><small class="text-muted">Reading Time : 1-5 min</small></p>
                </div>
            </div>
            <div class="col-md-8">
                <iframe class="card-img-bottom" style="max-width: auto;height: 350px;"
                    src="https://www.youtube.com/embed/1EadhOBcfI0" title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            </div>
        </div>
    </div>

</div>



<?php
require_once("footer.php");
?>
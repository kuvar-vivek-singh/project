<?php
define("preventAccess",TRUE);
?>
<?php
$title="Covid-19 information";
require_once("connection.php");
require_once("header.php");
?>
<div class="jumbotron text-center bg-light">
    <h2 class="text-success">Some Information About Covid-19</h2>
    <p>Preventive measures include physical or social distancing, quarantining, ventilation of indoor spaces, covering
        coughs and sneezes, hand washing, and keeping unwashed hands away from the face. The use of face masks or
        coverings has been recommended in public settings to minimize the risk of transmissions.
        Several vaccines have been developed and Our countries have initiated mass vaccination campaigns.</p>
</div>
<img src="banner/covid-19.jpg" alt="" style="height: 350px;width: 100%;">
<div class="container-fluid">


    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Sign and Symptoms of coronavirus</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p class="card-text">
                    <h5>Most Common symptoms:</h5>
                    <ul>
                        <li>fever</li>
                        <li>dry cough</li>
                        <li>tiredness</li>
                    </ul>
                    </p>
                </div>
                <div class="col">
                    <p class="card-text">
                    <h5>Less common symptoms:</h5>
                    <ul>
                        <li>aches and pains</li>
                        <li>sore throat</li>
                        <li>diarrhoea</li>
                        <li>conjunctivitis</li>
                        <li>headache</li>
                        <li>loss of taste or smell</li>
                        <li>a rash on skin, or discolouration of fingers or toes</li>
                    </ul>
                    </p>
                </div>
                <div class="col">
                    <p class="card-text">
                    <h5>Serious symptoms:</h5>
                    <ul>
                        <li>difficulty breathing or shortness of breath</li>
                        <li>chest pain or pressure</li>
                        <li>loss of speech or movement</li>
                    </ul>
                    </p>
                </div>
            </div>
            <div class="">
                <p class="card-text "> Seek immediate medical attention if you have serious symptoms. Always
                    call before visiting your doctor or health facility.<br>
                People with mild symptoms who are otherwise healthy should manage their
                    symptoms at home. <br>
                On average it takes 5–6 days from when someone is infected with the
                    virus for symptoms to show, however it can take up to 14 days.</p>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-2 mb-2">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Self quarantine</h3>
            
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <img src="banner/quarintine_en.png" alt="">
                </div>
                <div class="col">
                    <img src="banner/quarintine_hi.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron text-center">
    <h4>Eventwala Team Requesting To All</h4>
    <p>Please stay at home, keep social distancing, wear a Mask, Safe Our country</p>
    <p> To know more about coronavirus please visit wiki page</p>
    <a href="https://en.wikipedia.org/wiki/COVID-19#Signs_and_symptoms" target="_blank" class="btn btn-outline-success">Know more</a>
</div>
<div class="jumbotron text-center bg-light">
    <h3>Lockdown Guideline In Our Country</h3>
    <p>Lockdown guideline for different states are different so please go through News to keep update </p>
</div>
<?php
require_once("footer.php");
?>
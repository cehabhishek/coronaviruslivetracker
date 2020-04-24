<?php

                /* World Api Fetch*/
                $allCoronaVirusData = file_get_contents("https://api.covid19api.com/summary");
                $coronaVirusDataArray = json_decode($allCoronaVirusData,true); 
                $totalGlobalcases = $coronaVirusDataArray['Global']['TotalConfirmed'];
                $totalGlobalDeaths = $coronaVirusDataArray['Global']['TotalDeaths'];
                $totalGlobalRecovered = $coronaVirusDataArray['Global']['TotalRecovered'];
                $totalGlobalAciveCases = $totalGlobalcases-($totalGlobalDeaths+$totalGlobalRecovered);
                $coronaVirusCountryData = $coronaVirusDataArray['Countries'];

                
                foreach ($coronaVirusCountryData as $key => $confiremdCases)
                  {
                      $totalConfirmed[$key] = $confiremdCases['TotalConfirmed'];
                  }
                 
                array_multisort($totalConfirmed, SORT_DESC, $coronaVirusCountryData);


                /*India Api Fetch*/
                $allIndiaCoronaData = file_get_contents("https://api.covid19india.org/v2/state_district_wise.json");
                $jsonEncodeIndiaData = json_decode($allIndiaCoronaData,true); 

                // echo "<pre>";
                // print_r($jsonEncodeIndiaData);
                // // echo $jsonEncodeIndiaData[0]['state'];

                  // echo count($jsonEncodeIndiaData[0]['districtData']);
                // die();

                
              ?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Corona Virus Live Tracker</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://npmcdn.com/particlesjs@2.0.0/dist/particles.min.js"></script>
    <script type="text/javascript" src="main.js"></script>

</head>
<body>
   <canvas class="background"></canvas>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js"></script>
  <h1 class="text-center">Covid19 Live Tracker</h1>

    <div class="col-lg-12 col-md-12 col-sm-6">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="https://www.cdc.gov/coronavirus/2019-ncov/images/2019-coronavirus.png">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/SARS-CoV-2_without_background.png/597px-SARS-CoV-2_without_background.png">
        </div>
        <div class="card-info"> <h2 class="title"></h2>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="world" class="btn btn-primary" href="#tab1" data-toggle="tab">
                <div><b>World</b> </div>
                <input type="text" size="13" id="wordlinput" placeholder="Search..." onkeyup="worldFilter()" >
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="india" class="btn btn-default" href="#tab2" data-toggle="tab">
                <div><b>India</b></div>
                <input type="text"  size="13" id="indiainput" placeholder="Search..." onkeyup="indiaFilter()">
            </button>
        </div>
       
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade active in table-responsive" id="tab1">
          <table class="table table-striped table-bordered" id="wordlTable">
            <thead>
              <tr>
                <th>Country</th>
                <th>Total Cases</th>
                <th>New Cases</th>
                <th>New Deaths</th>
                <th>Total Deaths</th>
                <th>New Recovered</th>
                <th>Total Recovered</th>
                <th>Active Cases</th>
              </tr>
            </thead>
            <tbody>
               

              <tr>
                <td> All Country</td>
                <td><?php echo $coronaVirusDataArray['Global']['TotalConfirmed'] ?> </td>
                <td><?php echo $coronaVirusDataArray['Global']['NewConfirmed'] ?> </td>
                <td><?php echo $coronaVirusDataArray['Global']['NewDeaths'] ?> </td>
                <td><?php echo $coronaVirusDataArray['Global']['TotalDeaths'] ?> </td>
                <td><?php echo $coronaVirusDataArray['Global']['NewRecovered'] ?> </td>
                <td><?php echo $coronaVirusDataArray['Global']['TotalRecovered'] ?> </td>
                <td><?php echo $totalGlobalAciveCases ?> </td>
                
              </tr>

               <?php

                foreach ($coronaVirusCountryData as $key => $country) {
                  
                ?>
                
                <tr>
                  <td><?php echo $country['Country']; ?></td>
                  <td><?php echo $country['TotalConfirmed']; ?></td>
                  <td><?php echo $country['NewConfirmed']; ?></td>
                  <td><?php echo $country['NewDeaths']; ?></td>
                  <td><?php echo $country['TotalDeaths']; ?></td>
                  <td><?php echo $country['NewRecovered']; ?></td>
                  <td><?php echo $country['TotalRecovered']; ?></td>
                  <td>
                    <?php 
                      $totalcase = $country['TotalConfirmed'];
                      $totalDeaths = $country['TotalDeaths'];
                      $totalRecovered = $country['TotalRecovered'];
                      $totalActiveCases = $totalcase-($totalDeaths+$totalRecovered);

                      echo $totalActiveCases;
                     ?>
                  </td>
                </tr>

              <?php } ?>


            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="tab2">
            
            <table class="table table-bordered" style="border-collapse:collapse;" id="indiaTable">
                <thead>
                    <tr>
                        <th>State</th>
                        <th>Confiremd Cases</th>
                        <th>Active Cases</th>
                        <th>Recovered </th>
                        <th>Deceased</th>
                        
                    </tr>
                </thead>
                <tbody>

                  <?php

                    

                    $targetId = 1;
                    for ($i=0; $i < count($jsonEncodeIndiaData); $i++) { 

                      $districtData = $jsonEncodeIndiaData[$i]['districtData'];
                     
                      $totalConfirmedCasesInState = 0;      
                      $totalActiveCasesInState = 0;
                      $totalDeceasedInState = 0;
                      $totalRecoveredInState = 0;
                        foreach ($districtData as $key => $cases) {
                         
                         
                          $totalConfirmedCasesInState += $cases['confirmed'];
                          $totalActiveCasesInState +=  $cases['active'];
                          $totalDeceasedInState += $cases['deceased'];
                          $totalRecoveredInState += $cases['recovered'];
                        }

                      
                   ?>
                  
                  <tr colspan="6" data-toggle="collapse" data-target="#demo<?php echo $targetId; ?>" class="accordion-toggle">
                        <td><i class="fa fa-chevron-down" aria-hidden="true"></i>  <?php echo $jsonEncodeIndiaData[$i]['state']; ?></td>
                        <td><?php echo $totalConfirmedCasesInState; ?></td>
                        <td><?php echo $totalActiveCasesInState; ?></td>
                        <td><?php echo $totalRecoveredInState; ?></td>
                        <td><?php echo $totalDeceasedInState; ?></td>
                        
                    </tr>

               
                     
                    <tr class="p">
                        <td colspan="6" class="hiddenRow"  >
                          <div class="accordian-body collapse p-3" id="demo<?php echo $targetId; ?>"  >
                            <table class="table table-bordered" style="width: 900px; margin: auto;"  >
                              <tr>
                                <th>District</th>
                                <th>Confiremd </th>
                                <th>Active </th>
                                <th>Recovered </th>
                                <th>Deceased</th>
                              </tr>
                              <?php
                                for($j=0; $j < count($jsonEncodeIndiaData[$i]['districtData']); $j++ )        

                                    {

                                ?>
                              <tr>
                                <td><?php echo $jsonEncodeIndiaData[$i]['districtData'][$j]['district']; ?></td>
                                <td><?php echo $jsonEncodeIndiaData[$i]['districtData'][$j]['confirmed']; ?></td>
                                <td><?php echo $jsonEncodeIndiaData[$i]['districtData'][$j]['active']; ?></td>
                                <td><?php echo $jsonEncodeIndiaData[$i]['districtData'][$j]['recovered']; ?></td>
                                <td><?php echo $jsonEncodeIndiaData[$i]['districtData'][$j]['deceased']; ?></td>
                                
                              </tr>
                            <?php } ?>
                            </table>
                        </div> 
                      </td> 
                    </tr>
                    
                    <?php
                      
                      
                      $targetId++;
                           }

                     ?>
                    
                </tbody>
        </table>


        </div>
      
      </div>
    </div>
    
    </div>
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
     
</body>

</html>
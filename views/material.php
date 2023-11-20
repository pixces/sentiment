<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Exotel - Sentiments POC</title>
    <!-- MDB icon -->
    <link rel="icon" href="public/img/exotel-logo.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="public/css/mdb.min.css" />
    <link rel="stylesheet" href="public/css/style.css" />
  </head>

  <body>
    <!-- Start your project here-->
    <div id="preview" class="preview">
      <div style="display: none;"></div>
      <div>
        <div data-draggable="true" class style="position: relative;" draggable="false" id="navbar">
          <!---->
          <!---->
          <section draggable="false" class="overflow-hidden pt-0" data-v-271253ee>
            <section class style="padding-bottom: 1px;">
              <!-- Navbar --> 
              <nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-2">
                <!-- Container wrapper -->
                <div class="container-fluid">
                  <!-- Toggle button --> 
                  <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
                    <i class="fas fa-bars"></i>
                  </button> 
                  <!-- Collapsible wrapper --> 
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand --> 
                    <a class="navbar-brand mt-2 mt-lg-0" draggable="false" href="https://exotel.com" target="_blank"> 
                      <img src="https://my.exotel.com/assets/i/exotel-updated-logo-white.svg" height="30" alt="Exotel Techcom Pvt. Ltds" loading="lazy" aria-controls="#picker-editor" draggable="false"> 
                      <span class="badge rounded-pill badge-light ps-10">ExoAI</span>
                    </a>
                    <!-- Left links --> 
                    <!-- Left links --> 
                  </div>
                  <!-- Collapsible wrapper --> 
                  <!-- Right elements --> 
                  <div class="d-flex align-items-center"> 
                    <!-- Icon --> 
                    <a class="text-reset me-3" draggable="false"> 
                      <i class="fas fa-bell text-white" aria-controls="#picker-editor"></i> 
                      <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a> 
                    <a class="text-reset me-3" draggable="false"> 
                      <i class="fab fa-github text-white" aria-controls="#picker-editor"></i>
                    </a> 
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                      <img src="public/img/2.webp" class="rounded-circle" height="30" alt="Black and White Portrait of a Man" loading="lazy"/>
                    </a>    
                  </div> 
                  <!-- Right elements --> 
                </div>
                <!-- Container wrapper --> 
              </nav>
              <!-- Navbar --> 
            </section>
          </section>
          <!---->
        </div>
        <div data-draggable="true" style="position: relative;" class id="searchBox">
          <!----><!---->
          <section draggable="false" class="container pt-5" data-v-271253ee> 
            <section class="mb-5 text-center text-md-start"> 
              <div class="row d-flex justify-content-center"> 
                <div class="col-lg-10"> 
                  <div class="row justify-content-center"> 
                    <div class="col-md-6 mb-4 mb-md-0"> 
                      <div class="d-md-flex flex-row">
                        <div class="input-group rounded text-center align-items-center"> 
                          <input type="search" class="form-control form-control-lg rounded-9 border-white input-search" placeholder="Search" aria-label="Search" aria-describedby="search-addon"/> 
                          <span class="input-group-text border-0" id="search-addon"> 
                            <i class="fas fa-search fa-2x text-blue"></i> 
                          </span> 
                        </div> 
                      </div> 
                    </div> 
                  </div> 
                </div> 
              </div> 
            </section> 
          </section> 
          <!----> 
        </div>
        <?php if(isset($callData) && !empty($callData)){ ?>
        <div data-draggable="true" style="position: relative;" class id="callDetails">
          <!---->
          <!---->
          <section draggable="false" style="position: relative;" draggable="false" class>
            <section class="mb-6">               
              <div class="container"> 
                <div class="card mx-4 mx-md-5 shadow-4 rounded rounded-9" style="">                
                  <div class="card-header">                    
                    <div class="row">
                      <div class="col-md-8 text-start">
                        <span class="me-2">
                          <i class="fas text-success" aria-controls="#picker-editor"></i>
                          Call Reference:
                        </span>
                        <span class="me-2"><?=$callData['Sid']; ?></span>
                        <span class="">
                          <i class="fas text-success" aria-controls="#picker-editor"></i>
                        </span>
                      </div>
                      <div class="col-md-4 text-end">
                        <span class="me-2"><i class="fas fa-stopwatch"></i></span><span><?=$callData['Duration']; ?> Sec</span>
                      </div>
                    </div>
                  </div>
                  <div class="card-body py-4 px-md-4">
                    <div class="row align-items-center">
                      <div class="col-md-8 text-start">
                          <span class="badge rounded-pill badge-green fs-6">From: <?=$callData['From']; ?></span>
                          <span class="badge rounded-pill badge-gray fs-6">VN: <?=$callData['PhoneNumberSid']; ?></span>
                          <span class="badge rounded-pill badge-green fs-6">To: <?=$callData['To']; ?></span>
                      </div>
                      <div class="col-md-4 text-end">
                        <audio controls>
                          <source src="<?=$callData['RecordingUrl']; ?>" type="audio/mpeg">
                          Your browser does not support the audio element.
                        </audio>
                      </div>
                    </div>
                  </div>
                </div> 
              </div> 
            </section>
          </section>
          <!---->
        </div>
        <div data-draggable="true" style="position: relative;" class id="conversationInsights">
          <!---->
          <!---->
          <section draggable="false" class="container" data-v-271253ee><section class="mb-10 text-center"> 
            <section class="mb-6">
              <div class="row gx-lg-5"> 
                <div class="col-lg-8 col-md-12 mb-6 mb-lg-0"> 
                  <div class="card shadow-2-strong text-start"> 
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent no-border">
                      <div class="bg-gradient-blue shadow-3-strong rounded-6 py-3 pe-3 ps-3">
                        <h5 class="text-light"><i class="fas fa-robot"></i> Conversation Insights</h5> 
                      </div>                    
                    </div>  
                    <div class="card-body">                     
                      <div class="card-text ps-5 pe-5">
                        <!-- Section: Loader --> 
                        <section id="convLoader" class="text-center">
                          <div class="spinner-border m-5" role="status"></div>
                          <div><span class="text-muted">Loading Insights. Please wait...</span></div>
                        </section>
                        <!-- Section: Loader -->
                        <!-- Section: Timeline -->
                        <div id="convSummary" class="card-text bg-summary rounded-6 p-3 mb-5" style="display:none"> 
                          <h5 class="">Summary </h5>
                          <p class="bg-gray">Curabitur tristique, mi a mollis sagittis, metus felis mattis arcu, non vehicula nisl dui quis diam. Mauris ut risus eget massa volutpat feugiat. Donec.</p> 
                        </div>
                        <section class="py-2" id="convBody" style="display:none">
                          <ul class="timeline-with-icons">
                            <li class="timeline-item mb-5">
                              <span class="timeline-icon">
                                <i class="fas fa-phone fa-sm fa-fw"></i>
                              </span>

                              <h5 class="fw-bold">Transcript:</h5>
                              <p class="text-muted" id="convTranscript">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit
                                necessitatibus adipisci, ad alias, voluptate pariatur officia
                                repellendus repellat inventore fugit perferendis totam dolor
                                voluptas et corrupti distinctio maxime corporis optio?
                              </p>
                            </li>
                          </ul>
                        </section>
                        <!-- Section: Timeline -->
                      </div>  
                    </div>
                  </div> 
                </div>               
                <div class="col-lg-4 mb-6 mb-lg-0"> 
                  <div class="card shadow-2-strong"> 
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent no-border">
                      <div class="bg-gradient-blue shadow-3-strong rounded-6 py-3 pe-3 ps-3 text-start">
                        <h5 class="text-light"><i class="fas fa-filter"></i> Sentiments </h5> 
                      </div>                    
                    </div>  
                    <div class="card-body"> 
                      <section id="sentimentLoader">
                          <div class="spinner-border m-5" role="status"></div>
                          <div><span class="text-muted">Loading Insights. Please wait...</span></div>
                      </section>  
                      <section id="sentimentsBody" style="display:none" class>
                        <div class="positive sentiment-block"> 
                          <div><img src="public/img/icons8-grinning-face-with-big-eyes-96.png"></div>
                          <p>The Overall Sentiment for the call is</p>
                          <span class="badge rounded-pill badge-green fs-5">Positive</span>                      
                        </div>
                        <div class="neutral sentiment-block"> 
                          <div><img src="public/img/icons8-neutral-face-96.png"></div>
                          <p>The Overall Sentiment for the call is</p>
                          <span class="badge rounded-pill badge-gray fs-5">Neutral</span>                      
                        </div>
                        <div class="negative sentiment-block"> 
                          <div><img src="public/img/icons8-pouting-face-96.png"></div>
                          <p>The Overall Sentiment for the call is</p>
                          <span class="badge rounded-pill badge-red fs-5">Negative</span>                      
                        </div>    
                      </section>  
                    </div> 
                  </div> 
                </div> 
              </div> 
            </section> 
          </section>
          <!----> 
        </div>
        <?php } else { ?>
        <div data-draggable="true" style="position: relative;" class id="noDataFound">
          <!---->
          <!---->
          <section draggable="false" style="position: relative;" draggable="false" class>
            <section class="mb-6">               
              <div class="container text-center"> 
                <img src="public/img/no_data.png" alt="no data found">
              </div> 
            </section>
          </section>
          <!---->
        </div>
        <?php } ?>
      </div>            

    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="public/js/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript">
      $(document).ready(function () {
        //hide all unwanted divs
        $(".sentiment-block").hide();
        $("#sentimentsBody").hide();
        $("#convBody").hide();

        function getInsights(){
          $.ajax({
                url: 'insights.php?id=<?=$callData['Sid']; ?>',  // Replace with the correct path to your PHP file
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                  
                  //console.log(data.error.code);

                  if (!data.error){
                      //clear interval
                      console.log("clearing interval");
                      clearInterval(apiRequestInterval);
                      //process the data  
                      
                      $("#convSummary > p").text(data.Summary);
                      $("#convTranscript").text(data.Transcript);

                      //update the sentiment value
                      $('.neutral').toggle(data.Sentiment.toLowerCase().trim() === 'neutral');
                      $('.positive').toggle(data.Sentiment.toLowerCase().trim() === 'positive');
                      $('.negative').toggle(data.Sentiment.toLowerCase().trim() === 'negative');                             

                      //return HTML
                      //update the inner HTML to the container
                      //unhide the container  
                      //this will be in response to the data we got
                      $("#convSummary").toggle();
                      $("#sentimentLoader").hide();                    
                      $("#convLoader").hide();
                      $('#sentimentsBody').toggle();     
                      $('#convBody').toggle();     
                          
                  } else {
                    console.log("Not clearing interval");
                  } 
                                                
                },
                error: function (error) {
                    console.log('Error fetching data:', error);
                }
            });
        }
        //set interval to make API request every 30 secs
        var apiRequestInterval = setInterval( getInsights, 10000);   
      });
    </script>
  </body>

</html>
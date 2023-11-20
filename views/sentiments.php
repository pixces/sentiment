<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="public/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body>
    <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Exotel</a>
      </div>
    </nav>
  </header>
  <!-- Begin page content -->
  <main class="flex-shrink-0">
    <div class="container">
      <h1 class="mt-5">Sentiments Analysis</h1>
      <!-- card for the call details if present -->
      <div class="row mb-3">
        <div class="col-sm-12 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-header">
              <div>Call Reference: <?=$callData['Sid']; ?></div>
              <div> <?=$callData['Direction'].' | '.$callData['Status']; ?></div>
              <div>Duration: <?=$callData['Duration']; ?> sec</div>
            </div>
            <div class="card-body">
              <div>
                <div>From: <?=$callData['From']; ?></div>
                <div>Via: <?=$callData['PhoneNumberSid']; ?></div>
                <div>To: <?=$callData['To']; ?></div>
              </div>
              <div>
                <div>Start at: <?=$callData['StartTime']; ?></div>
                <div>End at: <?=$callData['EndTime']; ?></div>
                <div>Call Duration: <?=$callData['Duration']; ?> sec</div>
              </div>              
              <div>
                <div><?=$callData['RecordingUrl']; ?></div>
              </div>              
            </div>
          </div>
        </div>
      </div>  
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-header">
              <div>Call Reference: 8d23bf758ec43bbd4210ba68530c17bc</div>
              <div>Inbound | Completed</div>
              <div>Duration: 24 sec</div>
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card mb-3">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card">
            <div class="card-header">Header</div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
      </div>  
    </div>
  </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
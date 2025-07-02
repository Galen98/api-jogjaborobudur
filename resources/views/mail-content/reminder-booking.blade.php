<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
 .awesome-button {
    display: inline-block;
    padding: 10px 20px;
    background-color:#fc2c04;
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.imageemail{
    max-width:120px;
    max-height:120px;
}
.awesome-button:hover {
    background-color: #c72202;
}
    p{
        font-size: 17px;
    }
    table{
        border: 1px solid black;
    }
    thead{
        border: 1px solid black;
    }
    tr{
        border: 1px solid black;
    }
    th{
        border: 1px solid black;
    }
    tbody{
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
    }

    .footer {
  padding: 40px 0;
  background-color: #ffffff;
}
.footer .social {
  text-align: center;
  padding-bottom: 25px;
  color: #4b4c4d;
}
.footer .social a {
  font-size: 24px;
  color: inherit;
  width: 40px;
  height: 40px;
  line-height: 38px;
  display: inline-block;
  text-align: center;
  border-radius: 50%;
  margin: 0 8px;
  opacity: 0.75;
}
.footer .social a:hover {
  opacity: 0.9;
}
.footer ul {
  margin-top: 0;
  padding: 0;
  list-style: none;
  text-align: center;
  font-size: 18px;
  line-height: 1.6;
  margin-bottom: 0;
}
.footer ul a {
  color: inherit;
  text-decoration: none;
  opacity: 0.8;
}
.footer ul li {
  display: inline-block;
  padding: 0 15px;
}
.footer ul a:hover {
  opacity: 1;
}
.footer .copyright {
  margin-top: 15px;
  text-align: center;
  font-size: 13px;
  color: #aaa;
}
</style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <center>
                    <img src="https://www.jogjaborobudur.com/traveler/images/logoabout.JPG" class="imageemail" style="max-width: 180px;"/>
                </center>
            
                <h2 style="text-align: center;">Your Trip is in 3 Days</h2>
            
                <p style="text-align: center;">
                    <p>Hi <b>{!! $name !!} {!! $surname !!}</b>,</p>
                    <br>
                    <p>Just a quick reminder that your trip <b>**“{!! $travelName !!}”**</b> is scheduled for <b>**{!! $travelDate !!}**</b> — only 3 days left!</p>
                    <br>

                    <p>Here are your trip details:</p>
                   <p>- Travel Option: {!! $optionName !!}</p>
                    @if (!is_null($participants))
                    <p>- Participants: {!! $participants !!} person </p>   
                    @endif

                    @if (!is_null($adult))
                    <p>- Adult: {!! $adult !!} person</p>   
                    @endif

                    @if (!is_null($child))
                    <p>- Adult: {!! $child !!} person</p>   
                    @endif
                    <p>- Pickup Time: {!! $pickupTime !!}</p>
                    <br>
                    <p>Please ensure that your travel documents are prepared and any pickup arrangements (if selected) are confirmed.</p>

                    <p>We are looking forward to welcoming you and making your experience with Jogja Borobudur Tour & Travel a memorable one.</p>

                    <p>If you have any questions, don’t hesitate to reach out to us on <a href="mailto:care@jogjaborobudur.com">care@jogjaborobudur.com</a></p>
                    <br>
                    <p>Safe travels and see you soon!</p>
                </p>
            
                <br>
                <p style="text-align: center;">
                    Best regards,<br>
                    <strong>Jogja Borobudur Tour & Travel</strong>
                </p>
                <section class="footer" style="background-color: #fc2c04;color: white;margin-top:2px;">
                    <div class="social">
                      <a href="https://wa.me/628562862504"><img src="https://www.freepnglogos.com/uploads/whatsapp-png-image-9.png" height="40" width="40"></a>
                      <a href="https://www.tripadvisor.com/Attraction_Review-g14782503-d25132575-Reviews-Jogja_Borobudur_Tour_Travel-Yogyakarta_Yogyakarta_Region_Java.html"><img src="https://www.freepnglogos.com/uploads/tripadvisor-logo-png/file-tripadvisor-logo-svg-wikipedia-3.png" height="40" width="40"></a>
                      <a href="https://www.facebook.com/jogjaborobudur"><img src="https://www.freepnglogos.com/uploads/facebook-logo-icon/facebook-logo-icon-facebook-icon-png-images-icons-and-png-backgrounds-1.png" height="40" width="40"></a>
                      <a href="https://www.instagram.com/masheru__/"><img src="https://www.freepnglogos.com/uploads/instagram-icon-png/wait-considerations-make-before-switching-instagram-logo-icon-4.png" height="40" width="40"></a>
                      <a href="https://www.getyourguide.com/jogja-borobudur-tour-travel-s27125/">
                      <img src="https://play-lh.googleusercontent.com/QMg0LWwb9Ki67eLcIcFpZxvCvBrW0aefn6BmXBJq3zj1G5Z_LYxcPdGKs_WWx8R5Gw" height="40" width="40"></a>
                    </div>
                    <ul class="list">
                    </ul>
                    <p class="copyright" style="color: white;">Jogja Borobudur Tour & Travel</p>
                  </section>
            </div>            
</div>
</div>
</body>
</html>
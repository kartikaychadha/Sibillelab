<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sibille Lab - Resources</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="ie.css" />
<script type="text/javascript" src="unitpngfix.js"></script>
<![endif]-->
</head>
<body>
<!-- BEGIN wrapper -->
<div id="wrapper">
  <!-- BEGIN header -->
  <div id="header">
    <h1><font size=6>Sibille Lab</font><font size=4> Resources</font></h1>
    <!--
    <ul>
      <li class="f"><a href="#">Home</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="page.html">Demo Page</a></li>
      <li><a href="contact.html">Contact Page</a></li>
    </ul>
  -->
  </div>
  <!-- END header -->
  <!-- BEGIN body -->
  <div id="body">
    <!-- BEGIN content -->
    <div id="content">
      <!-- begin featured -->
      <div class="featured">
        <h2>Featured News</h2>
        <div class="thumb"> <iframe width=100% height=69% src="https://www.youtube.com/embed/5BmvaQbD2Ls" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <div class="text">
            <h3><a target="_blank" href="https://www.sibillelab.com/broadcast-feb142019/">New molecules reverse memory loss linked to Depression, Aging </a></h3>
            <p>New therapeutic molecules developed at Toronto’s Centre for Addiction and Mental Health (CAMH) show promise in reversing the memory loss linked to depression and aging.</p>
          </div>
        </div>

      </div>
      <!-- end featured -->
      <br><h2>Latest Lab Updates</h2>
      <!-- begin post -->
      <?php
      $server = 'kartikaychadha.com';
      $username = 'sibillelab';
      $password = 'camh123';
      $database = 'sibillelab-resources';

      try{
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
      } catch(PDOException $e){
        die( "Connection failed: " . $e->getMessage());
      }

      $q1="SELECT * FROM `updates` order by DateTime desc LIMIT 0,1";
      $query = $conn->query($q1);



      while ($datas = $query->fetch(PDO::FETCH_ASSOC)) {



        ?>

      <!-- begin post -->
      <div class="f post"> <a ><img src="<?php echo $datas['img']?>" alt="" /></a>

        <p class="details">
          <h2><?php echo $datas['title']?></h2>
          <?php
          $datetime = explode(" ",$datas['DateTime']);
          $date = $datetime[0];
          $reformatted_date = date('d F Y',strtotime($date));
          echo $reformatted_date;
          ?>  | Posted by: <?php echo $datas['Submit']?> <br>
          <?php if($datas['abstract']){echo $datas['abstract']?>...<?php } if($datas['link']){?><a target="_blank" href="<?php echo $datas['link']?>">View full Article</a><?php }?>
        </p>


      </div>
      <!-- end post -->

      <?php
    }//loop closed

       ?>
      <!-- end post -->
      <br><hr><br><h2>Upcoming Meetings <a href="archive-meetings.php">(View All)</a></h2>

      <!-- begin post -->
      <?php


      $q1="SELECT * FROM `meetings` where `indexpage`!=1 order by EventDate desc LIMIT 0,3";
      $query = $conn->query($q1);



      while ($datas = $query->fetch(PDO::FETCH_ASSOC)) {



        ?>

      <!-- begin post -->
      <div class="f post"> <a ><img src="<?php echo $datas['img']?>" alt="" /></a>

        <p class="details">
          <h2><?php echo $datas['title']?></h2>
          <?php if($datas['EventDate']){?>
            <?php
            $reformatted_eventdate = date('d F Y',strtotime($datas['EventDate']));
            $reformatted_eventtime = date('g a l',strtotime($datas['EventTime']));
            echo $reformatted_eventdate," | ",$reformatted_eventtime," | ",$datas['Venue'];?><?php }?><br>
            <?php echo "Event Type: <b>",$datas['Type'],"</b>";?><br>
            <?php echo "Presenter: <b>",$datas['Presenter'],"</b>";?><br>
            <?php if($datas['link']){?>Files: <a target="_blank" href="<?php echo $datas['link']?>">Click Here</a><?php }?><br>
            <?php if($datas['abstract']){echo $datas['abstract']?>...<?php } ?><br>
        </p>



      </div>
      <!-- end post -->

      <?php
    }//loop closed

       ?>
      <!-- end post -->






    </div>
    <!-- END content -->
    <?php
    require('menu.php'); ?>
    <!-- BEGIN right sidebar -->
    <div id="rsidebar">
      <!-- begin site sponsors
      <h2>Site Sponsors</h2>
      <div class="sponsors"> <a href="#"><img src="images/ad125x125.jpg" alt="" /></a> <a href="#"><img src="images/ad125x125.jpg" alt="" /></a> <a href="#"><img src="images/ad125x125.jpg" alt="" /></a> <a href="#"><img src="images/ad125x125.jpg" alt="" /></a> </div>
    end site sponsors -->
      <!-- begin twitter updates -->
      <h2>Twitter Updates</h2>
      <div class="twitter">
      <a class="twitter-timeline" href="https://twitter.com/esibille1000?ref_src=twsrc%5Etfw" width=280px height=400px>Tweets by Etienne Sibille</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      <!-- end twitter updates -->



        <!-- begin Suggested Readings -->

            <br><h2>Suggested Readings  <a href=readings.php>(View All)</a></h2>


            <?php


            $q1="SELECT * FROM `readings` order by DateTime desc LIMIT 0,1";
            $query = $conn->query($q1);



            while ($datas = $query->fetch(PDO::FETCH_ASSOC)) {



              ?>

            <!-- begin post -->
            <div class="f post">

              <p class="details"><b>
                <h2><?php echo $datas['title']?></h2>
                <?php
                $datetime = explode(" ",$datas['DateTime']);
                $date = $datetime[0];
                $reformatted_date = date('d F Y',strtotime($date));
                echo $reformatted_date;
                ?>  | Posted by: <?php echo $datas['Submit']?> <br></b>
                <?php if($datas['abstract']){echo $datas['abstract']?>...<?php } if($datas['link']){?><a target="_blank" href="<?php echo $datas['link']?>">View full Article</a><?php }?>
              </p>


            </div>
            <!-- end post -->

            <?php
          }//loop closed

             ?>

            <!-- end Suggested Readings -->

            <!-- begin featured video -->
            <h2>Featured Video</h2>
            <div class="video">
              <iframe  src="https://www.youtube.com/embed/7sT72vQbPyE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <!-- end featured video -->


          <!-- begin flickr gallery -->
          <h2>News <a href=news.php>(View All)</a></h2>
          <div class="flickr">
            <?php

            $q1="SELECT * FROM `news` order by DateTime desc LIMIT 0,8";
            $query = $conn->query($q1);



            while ($datas = $query->fetch(PDO::FETCH_ASSOC)) {



              ?>

              <a target="_blank" href="<?php echo $datas['link'];?>"><img src="images/logos/<?php echo $datas['img']?>" alt="" /></a>

              <?php
            }//loop closed

               ?>


            </div>
            <!-- end post -->




      </div>
      <!-- end flickr gallery -->
    </div>
    <!-- END right sidebar -->
    <div class="break"></div>
  </div>
  <!-- END body -->
</div>
<!-- END wrapper -->
<!-- BEGIN footer -->
<div id="footer">
  <p>This Website is created and maintained by <a href="http://www.kartikaychadha.com">Kartikay Chadha</a></p>
</div>
<!-- END footer -->
</body>
</html>

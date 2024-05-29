<?php session_start();?>
<!DOCTYPE html>

<html>
	<head>
		<title>Ratha Yatra Photogaphy Contest 2018</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

	
		<!-- Banner -->
			<section id="banner">
				<header>
					<h2 style="font-weight: bold;">রথযাত্রা ফটোগ্রাফি প্রতিযোগীতা</h2>
				</header>
				<p> রথযাত্রা মহোৎসব ২০১৮ উপলক্ষে <br /> মাসিক হরেকৃষ্ণ সমাচার এর আয়োজনে ফটোগ্রাফি প্রতিযোগীতা <br /> আপনিও অংশগ্রহণ করুন </p>
				<footer>
					<a href="#form" class="button style2 scrolly">অংশগ্রহণ করুন</a>
				</footer>
			</section>

		<!-- Feature 1 -->
			<article id="first" class="container box style1 right">
				<a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a>
				<div class="inner" style="font-size: 16px; padding: none; line-height: 20px;">
					<header>
						<h2 style="text-align: center;"> নিয়মাবলী</h2>
					</header>
					<ul>
						<li>একজন প্রতিযোগী সর্বোচ্চ ৩টি ছবি জমা দিতে পারবেন।</li>
						<li>ছবির সর্বনিম্ন সাইজ 1600x1200 হতে হবে।</li>
						<li>ছবির ফরমেট (jpg,jpeg) হবে।</li>
						<li>ছবিতে কোনো বর্ডার, ফ্রেম, ম্যাটিং বা এডিটিং থাকবে না।</li>
						<li>রথযাত্রার সংকীর্তন, শোভাযাত্রা ও ভক্তদের দৃশ্য ইত্যাদি ছবি তুলতে হবে।</li>
						<li>ডিএসএলআর কিংবা ভালো ক্যামেরাযুক্ত স্মার্টফোন দিয়ে ছবি তুলতে পারেন।</li>
						<li>জমা দেওয়ার সময় ১৪ জুলাই থেকে ২৩ জুলাই ২০১৮ (সকাল ১০টা) পর্যন্ত।</li>
					</ul>
				</div>
			</article>


		<!-- Portfolio -->
			<article class="container box style2">
				<header>
					
					<p>বিভিন্ন সময় ধারণকৃত রথযাত্রা মহোৎসবের কিছু চিত্র।</p>
				</header>
				<div class="inner gallery">
					<div class="row gtr-0">
						<div class="col-3 col-12-mobile"><a href="images/fulls/01.jpg" class="image fit"><img src="images/thumbs/01.jpg" alt="" title="Ad infinitum" /></a></div>
						<div class="col-3 col-12-mobile"><a href="images/fulls/02.jpg" class="image fit"><img src="images/thumbs/02.jpg" alt="" title="Dressed in Clarity" /></a></div>
						<div class="col-3 col-12-mobile"><a href="images/fulls/03.jpg" class="image fit"><img src="images/thumbs/03.jpg" alt="" title="Raven" /></a></div>
						<div class="col-3 col-12-mobile"><a href="images/fulls/04.jpg" class="image fit"><img src="images/thumbs/04.jpg" alt="" title="I'll have a cup of Disneyland, please" /></a></div>
					</div>
					<div class="row gtr-0">
						<div class="col-3 col-12-mobile"><a href="images/fulls/05.jpg" class="image fit"><img src="images/thumbs/05.jpg" alt="" title="Cherish" /></a></div>
						<div class="col-3 col-12-mobile"><a href="images/fulls/06.jpg" class="image fit"><img src="images/thumbs/06.jpg" alt="" title="Different." /></a></div>
						<div class="col-3 col-12-mobile"><a href="images/fulls/07.jpg" class="image fit"><img src="images/thumbs/07.jpg" alt="" title="History was made here" /></a></div>
						<div class="col-3 col-12-mobile"><a href="images/fulls/08.jpg" class="image fit"><img src="images/thumbs/08.jpg" alt="" title="People come and go and walk away" /></a></div>
					</div>
				</div>
			</article>

		<!-- Contact -->
			<article class="container box style3">
				<header>
					<h2>সাবমিট ফর্ম</h2>
					<p>ফর্মটি সঠিকভাবে পূরণ করুন <a href="/rules.html">বিস্তারিত নিয়মাবলী</a></p>
				</header>
				<form method="post" action="photography-contest-data.php" enctype="multipart/form-data"id="form">
					<div class="row gtr-50">
						<div class="col-6 col-12-mobile"><input type="text" class="text" name="name" placeholder="পূর্ণ নাম" required/></div>
						<div class="col-6 col-12-mobile"><input type="email" class="text" name="email" placeholder="ই-মেইল" required /></div>
						<div class="col-6 col-12-mobile"><input type="text" class="text" name="phone" placeholder="মোবাইল নম্বর" required /></div>
						<div class="col-6 col-12-mobile"><input type="text" class="text" name="address" placeholder="ঠিকানা" required /></div>
						<div class="col-12 col-12-mobile" id="picnotice">সর্বনিম্ন সাইজ 1600x1200। ফরমেট (jpg, jpeg) </div>
						
						<div class="col-4 col-12-mobile"><input type="file"  name="photo" accept=" .jpg, .jpeg" /></div>
						<div class="col-4 col-12-mobile"><input type="file"  name="upload2" accept=" .jpg, .jpeg" /></div>
						<div class="col-4 col-12-mobile"><input type="file"  name="upload3" accept=" .jpg, .jpeg" /></div>
						<div class="col-12">
							<textarea name="message" placeholder="বিবরণ  oooo" ></textarea>
						</div>
						<div class="col-12">
							<ul class="actions">
								<li><input type="submit" value="Submitff" /></li>
								<li><input type="reset" class="style3" value="Clear Form" /></li>
							</ul>
						</div>
					</div>
				</form>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					Select image to upload:
					<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="submit" value="Upload Image" name="submit">
				</form>
			</article>

		
		<section id="footer">
			<ul class="icons">
				<li><a href="https://twitter.com/hksamacar" class="icon fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
				<li><a href="https://facebook.com/hksamacar" class="icon fa-facebook" target="_blank" ><span class="label">Facebook</span></a></li>
				<li><a href="https://plus.google.com/+SamacarHK" class="icon fa-google-plus" target="_blank" ><span class="label">Google+</span></a></li>
				<li><a href="https://www.pinterest.com/harekrishnasamacar" class="icon fa-pinterest" target="_blank" ><span class="label">Pinterest</span></a></li>
				<li><a href="https://www.youtube.com/channel/UCRP-p5urnaGfTbKb3uQ3i7g" class="icon fa-youtube" target="_blank" ><span class="label">Youtube</span></a></li>
				<li><a href="https://bd.linkedin.com/in/hare-krishna-samacar-4ba95b145" class="icon fa-linkedin" target="_blank" ><span class="label">LinkedIn</span></a></li>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; <a href="https://www.hksamacar.com" rel="follow"> hksamacar</a>. All rights reserved.</li>
				</ul>
			</div>
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
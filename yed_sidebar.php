<div class="col-md-3"><!--sidebar-->
	<div class="title-bg">
		<div class="title">Kategoriler</div>
	</div>
	
	<div class="categorybox">
		<ul>

			<?php 
			$kategorisor=$db->prepare("SELECT * FROM kategori order by kategori_sira ASC");
			$kategorisor->execute();
			while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
			
			<li><a href="kategori-<?=seo($kategoricek["kategori_ad"]) ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>

			<?php } ?>
		</ul>
	</div>



	<!-- Kategoriler yukarıda -->

	<div class="ads">
		<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
	</div>

	<div class="title-bg">
		<div class="title">Best Seller</div>
	</div>
	<div class="best-seller">
		<ul>
			<li class="clearfix">
				<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
				<div class="mini-meta">
					<a href="#" class="smalltitle2">Panasonic M3</a>
					<p class="smallprice2">Price : $122</p>
				</div>
			</li>
			<li class="clearfix">
				<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
				<div class="mini-meta">
					<a href="#" class="smalltitle2">Panasonic M3</a>
					<p class="smallprice2">Price : $122</p>
				</div>
			</li>
			<li class="clearfix">
				<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
				<div class="mini-meta">
					<a href="#" class="smalltitle2">Panasonic M3</a>
					<p class="smallprice2">Price : $122</p>
				</div>
			</li>
		</ul>
	</div>

			</div><!--sidebar-->
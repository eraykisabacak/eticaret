<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Şifre Güncelle</div>
							<p >Bilgilerinizi aşağıdan düzenleyebilirsiniz...</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifre Güncelle</div>
				</div>

				<?php 

				if ($_GET['durum']=="farklisifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
				</div>

				<?php } elseif ($_GET['durum']=="eksiksifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>

				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
				</div>

				<?php } elseif ($_GET['durum']=="sifredegisti") {?>

				<div class="alert alert-success">
					<strong>Başarılı!</strong> Şifreniz başarıyla değişti
				</div>

				<?php }
				?>


				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="password" class="form-control"  required="" name="kullanici_eskipassword" placeholder="Eski Şifrenizi Giriniz">
					</div>
					
				</div>

				
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordone"    placeholder="Yeni Şifrenizi Giriniz">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordtwo"   placeholder="Yeni Şifrenizi Tekrar Giriniz">
					</div>
				</div>

				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">



				<button type="submit" name="kullanicisifreguncelle" class="btn btn-default btn-red">Şifre Değiştir</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<center><a href="sifre-guncelle"><img width="400" src="http://www.emrahyuksel.com.tr/dimg/sifremi-unuttum.jpg"></a></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>
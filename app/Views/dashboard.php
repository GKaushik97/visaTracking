<?php
/**
 * Dashboard
 */
?>
<?= $this->extend('template/template_admin') ?>
<?= $this->section('content') ?>
<div class="db-title">Employee Details</div>
<div class="row">
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee" class="bg9 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/employees.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($tot_employees) ? $tot_employees : '0'; ?></h4>
					<h6>Total Employees</h6>
				</div>
			</div>
		</a>
	</div>
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?emp_status=1" class="bg12 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/active_employees.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($active_employees) ? $active_employees : '0'; ?></h4>
					<h6>Active Employees</h6>
				</div>
			</div>
		</a>
	</div>
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?emp_status=0" class="bg1 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/in_active_employees.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($inactive_employees) ? $inactive_employees : '0'; ?></h4>
					<h6>Inactive Employees</h6>
				</div>
			</div>
		</a>
	</div>
</div>
<div class="db-title">Passport Expiry Details</div>
<div class="row">
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?type=1&status=2" class="bg12 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/passport_expiry_six_months.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($expiry_details['less_than_90']) ? $expiry_details['less_than_90'] : '0'; ?></h4>
					<h6>Passport Expiry in 3 months</h6>
				</div>
			</div>
		</a>
	</div>
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?type=1&status=1" class="bg5 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/passport_expiry_six_months.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($expiry_details['less_than_30']) ? $expiry_details['less_than_30'] : '0'; ?></h4>
					<h6>Passport Expiry in 1 month</h6>
				</div>
			</div>
		</a>
	</div>
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?type=1&status=0" class="bg1 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/passport_expired.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($expiry_details['less_than_0']) ? $expiry_details['less_than_0'] : '0'; ?></h4>
					<h6>Passport Expired</h6>
				</div>
			</div>
		</a>
	</div>
</div>
<div class="db-title">Visa Expiry Details</div>
<div class="row">
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?type=2&status=2" class="bg12 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/visa_expire1.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($visa_expiry_details['less_than_90']) ? $visa_expiry_details['less_than_90'] : '0'; ?></h4>
					<h6>Visa Expiry in 3 months</h6>
				</div>
			</div>
		</a>
	</div>	
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?type=2&status=1" class="bg5 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/visa_expire1.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($visa_expiry_details['less_than_30']) ? $visa_expiry_details['less_than_30'] : '0'; ?></h4>
					<h6>Visa Expiry in 1 month</h6>
				</div>
			</div>
		</a>
	</div>
	<div class="col">
		<a href="<? echo WEBROOT; ?>employee?type=2&status=0" class="bg1 bg-box-shadow mb-3" style="border-radius: 10px;display: block;padding:1.15rem;">
			<div class="d-flex align-items-center justify-content-start">
				<div class="db-icon">
					<img src="<?= WEBROOT ?>assets/images/dashboard/visa_expired.png" class="img-fluid" alt="db icon">
				</div>
				<div class="db-content">
					<h4><?= isset($visa_expiry_details['less_than_0']) ? $visa_expiry_details['less_than_0'] : '0'; ?></h4>
					<h6>Visa Expired</h6>
				</div>
			</div>
		</a>
	</div>
</div>
<style type="text/css">
	.bg1 {
		background-image: radial-gradient( circle 830px at 95.6% -5%,  rgba(244,89,128,1) 0%, rgba(223,23,55,1) 90% );
	}
	.bg2 {
		background-image: radial-gradient( circle 966px at 6.9% 10.8%, rgba(92,123,237,1) 0%, rgba(147,186,252,1) 90% );
	}
	.bg3 {
		/*background-image: radial-gradient( circle 830px at 95.6% -5%, rgb(6,190,182,1) 0%, rgb(72, 177, 191,1) 90% );*/
		background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,160,187,1) 0%, rgba(0,188,219,0.90) 90% );
	}
	.bg4 {
		/*background-image: linear-gradient( 73.1deg,  rgba(34,126,34,1) 8%, rgba(99,162,17,1) 86.9% );*/
		background-image: radial-gradient( circle 692px at 10.2% 79.3%,  rgba(10,192,255,1) 32.9%, rgba(3,106,226,1) 100.2% );
	}
	.bg5 {
		/*background-image: radial-gradient( circle 957px at 8.7% 50.5%,  rgba(249,47,47,1) 0%, rgba(246,191,13,1) 90% );*/
		/*background-image: radial-gradient( circle 571.5px at 10% 20%,  rgba(255,127,80,1) 8.3%, rgba(255,80,112,1) 82.6% );*/
		background-image: radial-gradient( circle 571.5px at 10% 20%,  rgba(255,155,57,1) 8.3%, rgba(255,179,71,1) 82.6% );
	}
	.bg6 {
		/*background-image: radial-gradient( circle 957px at 8.7% 50.5%,  rgba(176,57,105,1) 0%, rgba(229,113,159,1) 90% );*/
		background-image: linear-gradient( 109.1deg,  rgba(181,73,91,1) 7.1%, rgba(225,107,140,1) 86.4% );
	}
	.bg7 {
		background-image: radial-gradient( circle 627px at 16.2% 74.3%,  rgba(57,145,204,1) 89.9%, #bbb 90% );
	}
	.bg8 {
		background-image: radial-gradient( circle 939px at 0.7% 2.4%,  rgba(116,106,255,1) 0%, rgba(221,221,221,1) 100.2% );
	}
	.bg9 {
		/*background-image: linear-gradient( 72.5deg, rgb(0, 175, 255) 27.9%, rgb(103, 208, 255) 84.2% );*/
		background-image: radial-gradient( circle 939px at 50.3% 51.7%,  rgba(50,166,255,1) 0%, rgba(24,98,235,1) 50.8%, rgba(50,166,255,1) 90% );
	}
	.bg10 {
		background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(162,75,166,1) 5.8%, rgba(181,71,163,1) 96.9% );
	}
	.bg11 {
		background-image: radial-gradient( circle 993px at 0.4% 97.8%,  rgba(247,193,0,1) 32.8%, rgba(246,89,54,1) 99.9% );
	}
	.bg12 {
		background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(83,151,63,1) 0%, rgba(104,200,76,1) 90% );
	}
	.bg13 {
		background-image: radial-gradient( circle farthest-corner at 10% 20%, rgba(118,40,232,0.81) 0%, rgba(239,71,241,1) 90% );
	}
	.bg-box-shadow {
		box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
	}
	.db-icon {
		/*border:1px solid #fff;*/
		border-radius: 10px;
		padding: 0.75rem;
		width: 70px;
		height: 70px;
		box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 15px;
	}
	.db-content {
		padding-left: 1.15rem;
	}
	.db-content h4 {
		margin:0px;
		color: #ffffff;
		font-size: 22px;
		margin-bottom: 10px;
	}
	.db-content h6 {
		margin:0px;
		color: #ffffff;
	}
	.db-title {
		font-size: 1.125rem;
		font-weight: 700;
		margin-top: 1rem;
		margin-bottom: 1.5rem;
		background-color: rgba(255,255,255,0.75);
		display: block;
		padding: 1rem;
		border-radius: 10px;
		box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	}
</style>
<?= $this->endSection() ?>
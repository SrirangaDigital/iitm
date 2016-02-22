<script src='https://www.google.com/recaptcha/api.js'></script>

<h1>Contact</h1>
<h2>&nbsp;</h2>

<h3>&nbsp;</h3>
<div class="row">
	<div class="col-sm-5">
		<p>
			<strong>Indian Academy of Sciences</strong><br />
			C. V. Raman Avenue<br />
			Post Box No. 8005,<br />
			Raman Research Institute Campus,<br />
			Sadashivanagar,<br />
			Bengaluru 560 080<br />
			INDIA<br />
			<strong>Tel.</strong>: +91-80-2266 1200<br />
			<strong>Fax</strong>: +91-80-2361 6094<br />
			<strong>Email</strong>: office@ias.ernet.in
		</p>
	</div>
	<div class="col-sm-7">
		<form method="post" action="<?=BASE_URL . 'mail/send'?>" class="form-horizontal">
		    <div class="form-group">
		        <label for="name" class="control-label col-xs-2">Name</label>
		        <div class="col-xs-8">
		            <input type="text" class="form-control" id="name" name="name" placeholder="" required="required">
		        </div>
		        <div class="col-xs-2">&nbsp;</div>
		    </div>
		    <div class="form-group">
		        <label for="email" class="control-label col-xs-2">Email</label>
		        <div class="col-xs-8">
		            <input type="email" class="form-control" id="email" name="email" placeholder="" required="required">
		        </div>
		        <div class="col-xs-2">&nbsp;</div>
		    </div>
		    <div class="form-group">
		        <label for="subject" class="control-label col-xs-2">Subject</label>
		        <div class="col-xs-8">
		            <input type="text" class="form-control" id="subject" name="subject" placeholder="" required="required">
		        </div>
		        <div class="col-xs-2">&nbsp;</div>
		    </div>
		    <div class="form-group">
		        <label for="message" class="control-label col-xs-2">Message</label>
		        <div class="col-xs-8">
		            <textarea class="form-control" id="message" name="message" placeholder="" maxlength="1000" required="required"></textarea>
		        </div>
		        <div class="col-xs-2">&nbsp;</div>
		    </div>
		    <div class="form-group">
		        <div class="col-xs-offset-2 col-xs-10">
		            <div class="g-recaptcha" data-sitekey="6LeqfA0TAAAAAH9dlFGcniLF163KGcH9UDWqMf3R"></div>
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="col-xs-offset-2 col-xs-10">
		            <button type="submit" class="btn btn-primary naked">Submit</button>
		            <button type="reset" class="btn btn-primary naked">Clear</button>
		        </div>
		    </div>
		</form>
	</div>
</div><br />

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<div class="row">
	<div class="col-sm-12">
		<div id="map" style="width: 720px; height: 300px;margin-bottom: 30px"></div> 
	    <script type="text/javascript"> 
	      var myLatlng = new google.maps.LatLng(13.0143334, 77.5802109);
	      var myOptions = {
	         zoom: 15,
	         center: myLatlng,
	         mapTypeId: google.maps.MapTypeId.ROADMAP
	      };

	      var map = new google.maps.Map(document.getElementById("map"), myOptions);

	      var marker = new google.maps.Marker({
     			position: myLatlng,
			    map: map,
			    title: 'Indian Academy of Sciences, Bengaluru'
			  });

	    </script> 
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<p>
			<strong>Executive Secretary:</strong><br />
			<span class="text-primary">G. Chandramohan</span><br />
			<strong>Off. Tel.</strong>: +91-80-2266 1203 / +91-80-2361 3922<br />
			<strong>Fax</strong>: +91-80-2361 6094<br />
			<strong>Email</strong>: execsec@ias.ernet.in 
		</p>
	</div>
	<div class="col-sm-6">
		<p>
			<strong>Deputy Executive Secretary:</strong><br />
			<span class="text-primary">N. Maheshchandra</span><br />
			<strong>Off. Tel.</strong>: +91-80-2266 1214<br />
			<strong>Fax</strong>: +91-80-2361 6094<br />
			<strong>Email</strong>: dyexesec@ias.ernet.in<br />
		</p>
	</div>
</div><br />

<div class="row">
	<div class="col-sm-6">
		<p>
			<strong>Assistant Executive Secretary:</strong><br />
			<span class="text-primary">C. S. Ravikumar</span><br />
			Coordinator: Summer Research Fellowship Programme (Science Education Panel),<br />
			Public Information Officer<sup class="text-primary">*</sup><br />
			<strong>Off. Tel.</strong>: +91-80-2266 1207<br />
			<strong>Fax</strong>: +91-80-2361 6094<br />
			<strong>Email</strong>: ravi@ias.ernet.in
		</p>
		<p><sup class="text-primary">*</sup>only for matters that come under the<br /><a href="http://rti.gov.in/" target="_blank">Right to Information Act, 2005</a></p>
	</div>
	<div class="col-sm-6">
		<p>
			<strong>Assistant Executive Secretary:</strong><br />
			<span class="text-primary">B. Sethumani</span><br />
			<strong>Off. Tel.</strong>: +91-80-2266 1215<br />
			<strong>Fax</strong>: +91-80-2361 6094<br />
			<strong>Email</strong>: sethu@ias.ernet.in 
		</p>
	</div>
</div><br />

<div class="row">
	<div class="col-sm-6">
		<p>
			<strong>Vigilance Officer:</strong><br />
			<span class="text-primary">T. D. Mahabaleswara</span><br />
			Coordinator: Refresher courses and Lecture workshops (Science Education Panel)<br />
			<strong>Off. Tel.</strong>: +91-80-2266 1222<br />
			<strong>Fax</strong>: +91-80-2361 6094<br />
			<strong>Email</strong>: maha@ias.ernet.in
		</p>
	</div>
	<div class="col-sm-6">
		<p>
			<strong>Appellate Authority to RTI:</strong><br />
			Executive Secretary<br />
			Indian Academy of Sciences<br />
			<strong>Tel.</strong>: +91-80-2266 1203 / +91-80-2361 3922<br />
			<strong>Fax</strong>: +91-80-2361 6094<br />
			<strong>Email</strong>: execsec@ias.ernet.in
		</p>
	</div>	
</div>

<h4>Academy Fellows' Residency, Jalahalli</h4>
<p>
	Indian Academy of Sciences<br />
	(Next to ISRO Housing Colony, Near HMT School)<br />
	Jalahalli West<br />
	Bengaluru 560 031
	<strong>Tel.</strong>: +91-80-2838 1934<br />
	<a href="https://www.google.co.in/maps/place/Indian+Academy+of+Sciences+Guest+House/@13.0448978,77.5317997,15z/data=!4m2!3m1!1s0x0:0xaaee91ccf35c499f?sa=X&amp;ved=0CGgQ_BIwCmoVChMIjaXvtdf-xgIV1gaOCh0McwgN" target="_blank">Location on Google Map</a><br />
	<a href="<?=RESOURCES_URL?>About/sketch-map.pdf" target="_blank">Sketch Map</a>
</p>

<h4 class="gap-above-med"><a href="../Office_Staff">Office staff</a></h4>

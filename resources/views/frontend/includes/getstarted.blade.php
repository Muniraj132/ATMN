@extends('frontend.layouts.privacy-main')
@section('content')
<style type="text/css">
    h2{
        color: black;
    }
    h3{
        color: #801214;
    }
    .hero{
        background-color: #f1f6fe;
    }
</style>
<section class="hero" >
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 px-0 text-center">
            <div id="hero-text">
                <h1 style="color: #801214">Get Started</h1>
                <!-- <h4 style="color: #801214">of The Christian &amp; Missionary Alliance</h4> -->
            </div>
        </div>
    </div>
</section>

<section class="page-builder_text-paragraph paragraph px-4">
<div class="container">

<p>Ok! Let’s begin. In order to become a member of the Alliance Transitional Ministries Network, you will need to complete an application process. There are several steps to the process.</p>

<h3>Step 1: Assessment</h3>
<p style="margin-left: 30px">Prayerfully consider God’s call to transitional ministry. VitalChurch Ministries has developed a self-assessment that will help you consider your call to this strategic pastoral service. <a href="{{asset('uploads/files/Assessing Your Restoration Potential.pdf')}}" download><u>Click here to download the self-assessment</u></a>. You will be asked to upload the document when completing your Request for Certification.</p>

<h3>Step 2: Certification</h3>
<p style="margin-left: 30px">Complete your Request for Certification. The ATMN Request for Certification has two parts. The first part requests information related to your training and preferences. The second part is designed to help you evaluate past experience and reflect upon their influence upon your ministry as a transitional pastor. Click here to download <a href="{{asset('uploads/files/Application_PartI.pdf')}}" download><u> Part 1 </u></a> & <a href="{{asset('uploads/files/Application_PartII.pdf')}}" download><u>Part 2 </u></a>of the Request for Certification</u></a>.</p>

<h3>Step 3: Background Check</h3>
<p style="margin-left: 30px">Background checks are required. If the district where you are currently licensed has a recent one on file, it will not be necessary to complete another one. However, we do need your approval to do request a background check if it is necessary. This same form also includes a Mediation Agreement. <a href="{{asset('uploads/files/BackgroundCheck.pdf')}}" download><u>Click here to download the Authorization for a Background Check and the Mediation Agreement</u></a>.</p>

<h3>Step 4: Upload Your Documents</h3>
<p style="margin-left: 30px">When you have completed all three steps, click on the <a href="{{ url('/recruitment/dashboard') }}" ><u>Recruitment</u></a> tab at the top of the webpage and navigate to Training and Terms. Upload the completed documents there. Then complete the remaining tabs on the “Application” and “Submit” your request. You will receive a reply from the Office of Church Advance concerning your Request within a few days.</p>

</div>
</section>
 
@endsection
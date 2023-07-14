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
                <h1 style="color: #801214">Explore and find out</h1>
                <!-- <h4 style="color: #801214">of The Christian &amp; Missionary Alliance</h4> -->
            </div>
        </div>
    </div>
</section>

<section class="page-builder_text-paragraph paragraph px-4">
<div class="container">

<h4 style="color:#801214">Who Qualifies as an ATMN Certified Pastor?</h4>

<p>District superintendents place may Alliance pastors in transitional ministry at their own discretion. Certification by the Office of Church Advance is not required. However, it is advantageous.</p>

<p>Certification means that your pastoral gifts and experience have been proven and that you have been trained for intentional transitional ministry. It means you believe God is calling you to invest those ministry assets in the church local. Intentional transitional ministry requires particular leadership skills as well as the ability to respond to conflict in biblical ways. Certification verifies your potential for ministry in Alliance churches.</p>

<h6 style="color:#801214">Members of the Alliance Transitional Ministries Network are expected to meet the following requirements.</h6>

<ol>
    <li>Profession of faith in Jesus Christ as Savior and Lord and a sense of God’s call to serve the local church as a transitional pastor.</li>
    <li>Currently licensed as an active or retired official worker and active in a local Alliance church.</li>
    <li>Ten years or more of ministry experience as a pastor; five of which must be as a senior pastor.</li>
    <li>Recommendation by a current district superintendent.</li>
    <li>Completion of an approved training course in transitional ministry.</li>
    <li>Training in Alliance Peacemaking (Resolving Everyday Conflict) or its equivalent</li>
</ol>

<p>If you believe God is calling you to transitional ministry please return to the <a href="{{ URL::to('/') }}">Home Page</a> and "<a href="{{ route('getstarted') }}">Get Started</a>".</p>

</div>
</section>
 
@endsection
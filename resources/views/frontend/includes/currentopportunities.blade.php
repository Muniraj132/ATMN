<!-- Current Opportunities Section  -->
<section id="opportunities" class="opportunities">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
       <h3>Current <span>Opportunities</span></h3>
    </div>
    <br>
    @if($opportunitiescount != 0)
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="row">
          <div class="col-md files" align="center"style="padding-bottom: 20px;">
              @foreach($opportunities as $value)
                <h6>{{ $no++ }} . {{$value->opportunities}}</h6>
              @endforeach
          </div>
        </div>
      </div>
    </div>
     @endif
    <div class="row justify-content-center">
       <div class="col-xl-10">
        <div class="row">
          <div class="col-md files" align="center"style="padding-bottom: 20px;">
            <h6>
              <span style="background-color: #d5d5d5;padding: 0 16px 3px 16px;border-radius: 20px;">* Contact your District Superintendent for more Opportunities</span>
            </h6>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- Current End Opportunities Section -->


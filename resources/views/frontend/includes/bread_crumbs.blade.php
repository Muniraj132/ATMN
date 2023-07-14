<section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ request()->is('pastor/create') ? 'My Application' : '' }}</h2>
          @if(request()->is('recruitment/dashboard'))
          <ol>
            <li><a href="{!! URL::to('recruitment/dashboard') !!}">Recruitment</a></li>
            <li>{{ request()->is('*/dashboard') ? 'Dashboard' : '' }}</li>
          </ol>
          @endif
          @if(!request()->is('recruitment/dashboard'))
          <ol>
            <li><a href="{!! URL::to('recruitment/dashboard') !!}">Dashboard</a></li>
            <li>

              {{ request()->is('*/app/*') ? 'Profile' : '' }}
              {{ request()->is('*/profile') ? 'Profile' : '' }}
              {{ request()->is('*/brief') ? 'Briefing History' : '' }}
              {{ request()->is('*/brief/*') ? 'Briefing History' : '' }}
              {{ request()->is('*/resourceindex') ? 'Resourse Uploads' : '' }}
              {{ request()->is('*/opportunitiesindex') ? 'Current Opportunities' : '' }}
              {{ request()->is('*/adminapplicationlist') ? 'Pastor Application list' : '' }}
              {{ request()->is('*/admin-availability-list') ? 'Pastor Available list' : '' }}
              {{ request()->is('*/districtpendinglist/*') ? 'Pastor Application - Pending list' : '' }}
              {{ request()->is('*/districtapprovedlist/*') ? 'Pastor Application - Approved list' : '' }}
              {{ request()->is('*/dspendinglist') ? 'Pastor Application - Pending list' : '' }}
              {{ request()->is('*/dsapprovedlist') ? 'Pastor Application - Approved list' : '' }}
              {{ request()->is('*/brief-dspending-list') ? 'Briefing History - Pending list' : '' }}
              {{ request()->is('*/brief-dsapproved-list') ? 'Briefing History - Approved list' : '' }}
              {{ request()->is('*/brief-adminpending-list') ? 'Briefing History - Pending list' : '' }}
              {{ request()->is('*/brief-adminapproved-list') ? 'Briefing History - Approved list' : '' }}

              {{ request()->is('*/candidate-search') ? 'Candidate Search' : '' }}
              {{ request()->is('*/pastor-search') ? 'Pastor Search' : '' }}
              {{ request()->is('*/users-list') ? 'Users List' : '' }}
              {{ request()->is('*/district-staff-list') ? 'District Staff List' : '' }}
              {{ request()->is('*/restore-user') ? 'Restore User' : '' }}
              {{ request()->is('*/pastor-availability') ? 'Pastor Availability' : '' }}
              {{ request()->is('*/availablity-list') ? 'Availablity List' : '' }}
              {{ request()->is('*/ds-placed-list') ? 'Placed List' : '' }}
              {{ request()->is('*/ds-available-list') ? 'Available List' : '' }}
              {{ request()->is('*/district-placed-list/*') ? 'Placed List' : '' }}
              {{ request()->is('*/district-available-list/*') ? 'Available List' : '' }}
              {{ request()->is('*/contact-us-report') ? 'Contact Us Report' : '' }}
              

            </li>
          </ol>
          @endif
        </div>

      </div>
</section>
<style type="text/css">
  ol > li a:hover{
    color: #444444;
  }
</style>
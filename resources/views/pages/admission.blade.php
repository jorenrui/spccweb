@extends('layouts.pages', ['title' => 'Admissions'])

@section('content')
<!-- Page Cover Section -->
<section class="section page-cover">
  <div class="page-title">
    <h1>Admissions</h1>
  </div>

  <canvas class="particles-background"></canvas>
</section>
<!-- end Page Cover Section -->

<!-- Enrollment Section -->
<section class="section enroll">

  <div class="enroll-requirements">
    <div class="title">
      <h2>Admission Requirements</h2>
    </div>
    <div class="content">
      <ul>
        <li>Photocopy of Birth Certificate (NSO)</li>
        <li>3 copies of 2x2 pic</li>
        <li>Certificate of Good Moral Character</li>
        <li>F137/138 (New Student)</li>
        <li>Copy of Grades (Transferee)</li>
        <li>Transfer of Credentials (Transferee)</li>
      </ul>
    </div>
  </div>

  <div class="enroll-procedure">
    <div class="title">
      <h3>Enrollment Procedure (New Students)</h3>
      <p class="note">Note: For old students please proceed to the Principal’s Office.</p>
    </div>
    <div class="content">
      <ol>
        <li>Marketing Office
          <ul>
            <li>Inquiry</li>
            <li>Filling up of Application Forms</li>
            <li>Data Encoding</li>
          </ul>
        </li>
        <li>OSSA
          <ul>
            <li>Verification of Requirements</li>
          </ul>
        </li>
        <li>Guidance Office
          <ul>
            <li>Testing and Interview</li>
          </ul>
        </li>
        <li>Academic Head's Office
          <ul>
            <li>Placement Interview</li>
          </ul>
        </li>
        <li>Accounting Office
          <ul>
            <li>Payment</li>
          </ul>
        </li>
        <li>OSSA
          <ul>
            <li>Submission of Registration Forms</li>
          </ul>
        </li>
        <li>MIS
          <ul>
            <li>Picture Taking (ID)</li>
          </ul>
        </li>
      </ol>
    </div>
  </div>

  <div class="bg">
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-small" />
    <img src="{{ asset('spccweb/img/circle-pattern-white.svg') }}" class="circle-pattern-big" />
  </div>
</section>
<!-- end Enrollment Section -->

<!-- Policies Section -->
<section class="section policies">
  <div class="headline">
    <h2>SPCC Admission Policies</h2>
  </div>
  <div class="content">
    <div class="policy-group">
      <h3 class="title">Applicants to Kinder and Grade 7 of the Basic Education Department must meet the following
        requirements for
        admission:</h3>
      <ul>
        <li>Report Card with a general average of 80 and above for Grade 6 (with no grades below 80, specifically in
          Science, Math and English)</li>
        <li>Entrance examination result</li>
        <li>Preliminary and final interviews together with other supporting credentials</li>
        <li>Certification of acceptable behavior and conduct</li>
      </ul>
    </div>

    <div class="policy-group">
      <h3 class="title">Admission of transferees is limited only for Grade 1, Grade 2, and Grade 8. Transferees must
        have the
        following requirements:</h3>
      <ul>
        <li>A general average of not lower than 80, in all the subjects taken previously, in his/her former school
        </li>
        <li>Passing grades in all subjects</li>
        <li>Initial interview result and evaluation of credentials to determine qualification for entrance examination
        </li>
        <li>Passing scores in the SPCC Entrance Test</li>
        <li>Submission of all other requirements as deemed necessary by the Office of Admissions and other offices
        </li>
      </ul>
    </div>

    <div class="policy-group">
      <h3 class="title">Admission Requirements for New Enrolles and Transferees:</h3>
      <ul>
        <li>Report Card/Form 138 (original)</li>
        <li>Birth Certificate (photocopy)</li>
        <li>Baptismal Certificate or its equivalent (photocopy)</li>
        <li>Medical Certificate with fit to study remarks (original)</li>
        <li>Certificate of Good Moral Character</li>
        <li>3 pcs. 2x2 colored ID picture with blue background</li>
        <li>1 pc. long brown envelope</li>
      </ul>
    </div>

    <div class="policy-group">
      <h3 class="title">Admission Procedure</h3>
      <ol>
        <li>Present a copy of the original report card to the Principal's Office for preliminary screening.</li>
        <li>Fill up an application form.</li>
        <li>Proceed for the initial interview. New students, transferees and foreign student applicants should proceed
          to the ADSA's office for the initial interview.</li>
        <li>Pay the application/testing fee of Php 250.00 at the Cashier.</li>
        <li>Present the receipt of payment to the Principal’s Office to obtain the test permit.</li>
        <li>Complete the forms and submit them with the other requirements to the Principal’s Office during the
          entrance examination day.</li>
        <li>Take the entrance exam as scheduled. Bring the test permit to the presented to the examiner.</li>
        <li>Wait for the exam results to be notified by the secretary through phone call or visit the office on a
          specified date of its release.</li>
        <li>Enroll on the scheduled date upon completion of all the requirements needed.</li>
      </ol>
    </div>
  </div>
</section>
<!-- Policies Section -->
@endsection
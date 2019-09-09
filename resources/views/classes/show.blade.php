@extends('layouts.app', ['title' => 'Class Scheduling'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid mt--7">

      <div class="row mt-5">
        <div class="col-12 col-lg-5 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-body row align-items-center">
              <div class="col">
                <h2 class="mb-0">
                  {{ $sclass->course_code }} | {{ $sclass->course->description }}
                </h2>
                <p class="text-muted text-sm">{{ $degree }}</p>

                <hr class="my-4" />

                <dl class="row text-sm">
                    <dt class="col-sm-5">
                        Academic Term:
                    </dt>
                    <dd class="col-sm-7">
                        {{ $sclass->acadTerm->getAcadTerm() }}
                    </dd>
                    <dt class="col-sm-5">
                        Instructor:
                    </dt>
                    <dd class="col-sm-7">
                        {{ $sclass->instructor->user->getNameWithTitle() }}
                    </dd>
                    <dt class="col-sm-5">
                        Credits:
                    </dt>
                    <dd class="col-sm-7">
                        {{ $sclass->course->getCredits() }}
                    </dd>
                    <dt class="col-sm-5">
                        Schedule (Lec):
                    </dt>
                    <dd class="col-sm-7">
                        {{ $sclass->getLecSchedule() }}
                    </dd>
                    @if($sclass->course->lab_units > 0)
                    <dt class="col-sm-5">
                        Schedule (Lab):
                    </dt>
                    <dd class="col-sm-7">
                        {{ $sclass->getLabSchedule() }}
                    </dd>
                    @endif
                </dl>

                <hr class="my-4" />

                <div class="row">
                  <div class="col">
                    <a href="/classes" class="btn btn-outline-secondary btn-sm">
                      Return
                    </a>
                    @role('admin')
                    <a href="/classes/{{ $sclass->class_id }}/edit" class="btn btn-outline-info btn-sm">
                      Edit Class
                    </a>

                    <form method="POST" action="{{ action('SClassController@destroy', $sclass->class_id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger btn-sm">Dissolve Class</button>
                    </form>
                    @endrole
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-lg-7 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Students Enrolled</h3>
                    </div>
                    @role('admin')
                    <div class="col text-right">
                        <a href="/grades/create/{{ $sclass->class_id }}" class="btn btn-sm btn-primary">
                          Enroll Student
                        </a>
                    </div>
                    @endrole
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col" class="text-center">Student No.</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Grade</th>
                            <th scope="col" class="text-center">Re-exam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left" scope="row">
                                <form method="POST" action="#" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-outline-warning btn-sm">Drop</button>
                                </form>
                            </td>
                            <td class="text-center">2014-10928</td>
                            <td>Joeylene Rivera</td>
                            <td class="text-center">1.50</td>
                            <td class="text-center">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
              <!-- TODO: Add grades pagination -->
            </div>
          </div>
        </div>
      </div>

      @include('layouts.footers.auth')
    </div>
@endsection
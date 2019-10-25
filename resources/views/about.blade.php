@extends('layouts.app', ['title' => 'About'])

@section('content')
    @include('layouts.headers.plain')

    <div class="container-fluid">
        <div class="row mt--4">
            <div class="col">
                <div class="card shadow">
                    <div class="card-body">
                      <div class="row">
                        <div class="col text-center">
                            <img src="{{ asset('spccweb/img/brand.png') }}" alt="logo" class="my-2">
                            <h1 class="lead">Systems Plus Computer College - Caloocan Portal</p>
                            <p>Version 1.0.0</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row mt-3">
                        <div class="col">
                          <p>
                            MIT License
                          </p>
                          <p>
                            Copyright (c) 2020 <a target="_blank" href="/team">JOBRYGE</a>
                          </p>
                          <p>
                            Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
                          </p>
                          <p>
                            The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
                          </p>
                          <p>
                            THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
                          </p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
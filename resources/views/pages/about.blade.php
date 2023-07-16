@extends('layouts.app')
@section('content')
<div id="about">
        <div id="about-images">
                </div>
                <div class="row">
                <div id="tagline" class="justify-content-center">
                        <h1>- What We Do -</h1>
                        <p>Portstewart Community Association is a charitable organisation who currently organises and implemets
                          <a href="/red-sails" target="_blank">The Red Sails Festival</a> alongside other events and activities for the benefit
                          of the community.</p>
                          <br>
                          <div class="text-center">
                            <a href="/register"><button class="btn btn-primary become-member" type="button">Become a Member Today!</button></a>
                          </div>
                        </div>
                      </div>
                      <div id="about-projects">
                      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-3 justify-content-center">
                        <div class="col mb-4">
                          <div class="card">
                            <img src="/img/red_sails.jpg" class="card-img-top img-fluid img-thumbnail" alt="..." style="object-fit:cover;">
                            <div class="card-body">
                              <h1 class="card-title"><a href="/red-sails">Red Sails Festival</a></h1>
                              <p class="card-text" style="width: 90%; margin: auto;">Red Sails Festival runs over the course of a week every summer in Portstewart. Live music, dance and activities for everyone to enjoy, finishing with our famous fireworks display</p>
                            </div>
                          </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card">
                              <img src="/img/event.jpg" class="card-img-top img-fluid img-thumbnail" alt="..." style="object-fit:cover;">
                              <div class="card-body">
                                <h1 class="card-title"><a href="/event">Community Events</a></h1>
                                <p class="card-text" style="width: 90%; margin: auto;">Portstewart Community Association hold events of all kinds for people of all ages within the community. Why not go to our <a href="/event">events</a> page to find an event for you?</p>
                              </div>
                            </div>
                          </div>
                          <div class="col mb-4">
                            <div class="card">
                              <img src="/img/cleanup.jpg" class="card-img-top img-fluid img-thumbnail" alt="..." style="object-fit:cover;">
                              <div class="card-body">
                                <h1 class="card-title">Town Clean-Ups</h1>
                                <p class="card-text" style="width: 90%; margin: auto;">Once a month, members of the PCA alongside members of the local community commit an hour of their time to helping to keep our town tidy. Refreshments available afterwards</p>
                              </div>
                            </div>
                          </div>
                    </div>
                      </div>
                {{-- <div id="about-team">
                        <h1>- Our Team -</h1>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                            <div class="col mb-4">
                              <div class="card">
                                <img src="/img/person.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h1 class="card-title">Name Here</h1>
                                  <p class="card-text" style="width: 90%; margin: auto;">Role Here</p>
                                </div>
                              </div>
                            </div>
                            <div class="col mb-4">
                                <div class="card">
                                  <img src="/img/person.jpeg" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h1 class="card-title">Name Here</h1>
                                    <p class="card-text" style="width: 90%; margin: auto;">Role Here</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col mb-4">
                                <div class="card">
                                  <img src="/img/person.jpeg" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h1 class="card-title">Name Here</h1>
                                    <p class="card-text" style="width: 90%; margin: auto;">Role Here</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col mb-4">
                                <div class="card">
                                  <img src="/img/person.jpeg" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h1 class="card-title">Name Here</h1>
                                    <p class="card-text" style="width: 90%; margin: auto;">Role Here</p>
                                  </div>
                                </div>
                              </div>
                        </div> --}}
                </div>
        </div>
</div>
@endsection
